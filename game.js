var assets;
var welcomeText;
var button, buttonText;
var signs = [];
var prevSign;
var prevSignSkin;
var container;
var overlay;
var bg;
var isdown = true;
var app;

var wheel, wheelTop, wheelCircle;
var winSound;
var tickSound = [];
var winCircle;

window.wheel = wheel;
window.wheelTop = wheelTop;
window.wheelCircle = wheelCircle;


// window.PIXI = PIXI;
// globalThis.__PIXI_APP__ = app;

document.addEventListener('DOMContentLoaded', () => {
    var gameContainer = document.getElementById('game-container');

    app = new PIXI.Application({
        width: gameContainer.offsetWidth, height: gameContainer.offsetHeight,
        backgroundAlpha: 0,
        antialias: true, resizeTo: null
    });

    gameContainer.appendChild(app.view)




    PIXI.Assets.add('spin_wheel_base', '../FortuneWheel/assets/spin_wheel_base.png');
    PIXI.Assets.add('spin_wheel_base1', '../FortuneWheel/assets/spin_wheel_base1.png');
    PIXI.Assets.add('spin_wheel_base2', '../FortuneWheel/assets/spin_wheel_base2.png');
    PIXI.Assets.add('spin', '../FortuneWheel/assets/spin.png');
    PIXI.Assets.add('top', '../FortuneWheel/assets/top.png');
    PIXI.Assets.add('circle', '../FortuneWheel/assets/circle.png');
    PIXI.Assets.add('winSound', '../FortuneWheel/assets/dice_win.mp3');
    PIXI.Assets.add('tick1', '../FortuneWheel/assets/tick1.mp3');
    PIXI.Assets.add('tick2', '../FortuneWheel/assets/tick2.mp3');
    PIXI.Assets.add('tick3', '../FortuneWheel/assets/tick3.mp3');
    PIXI.Assets.add('tick4', '../FortuneWheel/assets/tick4.mp3');
    // PIXI.Assets.add('button_over', 'assets/button_over.png');

    var assetKeys = ['spin_wheel_base', 'spin', 'top', 'circle', 'spin_wheel_base1', 'spin_wheel_base2', 'winSound', 'tick1', 'tick2', 'tick3', 'tick4'];
    for (let i = 1; i < 9; i++) {
        PIXI.Assets.add('result' + i, '../FortuneWheel/assets/result' + i + '.png');
        assetKeys.push('result' + i);
    }

    const texturesPromise = PIXI.Assets.load(assetKeys);
    texturesPromise.then((asset) => {
        assets = asset;

        winSound = PIXI.sound.Sound.from(assets.winSound);
        // tick1 = PIXI.sound.Sound.from(assets.tick1);
        tickSound.push(PIXI.sound.Sound.from(assets.tick1));
        tickSound.push(PIXI.sound.Sound.from(assets.tick2));
        tickSound.push(PIXI.sound.Sound.from(assets.tick3));
        tickSound.push(PIXI.sound.Sound.from(assets.tick4));

        bg = PIXI.Sprite.from(assets.spin_wheel_base1);
        bg.anchor.set(0.5);
        bg.x = app.screen.width * 0.5;
        bg.y = app.screen.height / 2;
        // bg.eventMode = 'static';
        // bg.cursor = 'pointer';
        // bg.on('pointerdown', onButtonDown)
        app.stage.addChild(bg);


        wheel = PIXI.Sprite.from(assets.spin);
        wheel.anchor.set(0.5);
        wheel.position.set(app.screen.width * 0.5, 335)
        app.stage.addChild(wheel);




        var wheelCircle = PIXI.Sprite.from(assets.circle);
        wheelCircle.anchor.set(0.5);
        wheelCircle.x = app.screen.width * 0.5;
        wheelCircle.y = app.screen.height * .5;
        app.stage.addChild(wheelCircle);
        wheelCircle = wheelCircle;

        winCircle = new PIXI.Graphics();
        winCircle.alpha = 0
        window.winCircle = winCircle;
        app.stage.addChild(winCircle);


        var top = PIXI.Sprite.from(assets.top);
        top.anchor.set(0.5, 0);
        top.position.set(app.screen.width * 0.5, 55)
        app.stage.addChild(top);
        wheelTop = top;

        return;

    });


});
function spin() {
    onButtonDown();
    var spinBtn = document.getElementById('spin-btn');
    spinBtn.style.display = 'none';
}
function showWin(n) {
    var result = sliceToResult(n);
    // console.log("result",result);

    
    winCircle.beginFill(result.color); // Red color
    winCircle.drawCircle(0, 0, 10); // Radius initially set to 10
    winCircle.endFill();
    winCircle.x = app.screen.width / 2;
    winCircle.y = 335;
    winCircle.alpha = 1
   
    
    gsap.to(winCircle, {
        duration: 0.5,
        width: 420,
        height: 420,
        ease: 'power2.out', // Easing function
    });

    var top = PIXI.Sprite.from(assets['result' + result.id]);
    top.anchor.set(0.5);
    top.position.set(app.screen.width * 0.5, app.screen.height * 0.5)
    app.stage.addChild(top);

    const welcomeTextStyle = new PIXI.TextStyle({
        fontFamily: 'Kanit',
        align: 'center',
        fontSize: 20,
        fontWeight: 'bold',
        fill: ['#000000'],
    });
    welcomeText = new PIXI.Text('You have won!', welcomeTextStyle);
    welcomeText.anchor.set(0.5);
    welcomeText.x = app.screen.width * 0.5;
    welcomeText.y = 220;
    app.stage.addChild(welcomeText);
    window.welcomeText = welcomeText;

    var resultText = new PIXI.Text(result.name, {
        fontFamily: 'Kanit',
        align: 'center',
        fontSize: 30,
        fontWeight: 'bold',
        fill: ['#000000'],
        wordWrap: true,
        wordWrapWidth: 250,
    });
    resultText.anchor.set(0.5);
    resultText.x = app.screen.width * 0.5;
    resultText.y = 480;
    app.stage.addChild(resultText);
    window.resultText = resultText;
}

function sliceToResult(n) {
    var results = [
        { name: 'McLaren GT', color: 0xF67A3E, id: 1 },
        { name: 'Mercedes-Benz GWagon', color: 0x30B676, id: 2 },
        { name: 'Cash Bonus 100', color: 0xC9E266, id: 8 },
        { name: 'Blue watch', color: 0xFF6060, id: 4 },
        { name: 'Audi RS 5 Coupé', color: 0xFFFFFF, id: 3 },
        { name: 'iPhone 15 Pro Max', color: 0x2EB574, id: 6 },
        { name: 'Cash Bonus 50', color: 0xF67A3E, id: 8 },
        { name: '10 ounces of gold', color: 0xC9E266, id: 5 },
        { name: 'Cash Bonus 500', color: 0xFF6060, id: 7 },
        { name: 'Cash Bonus 30', color: 0xFFFFFF, id: 8 },
    ]
    return results[n];
}

function onButtonDown() {
    // console.log("Changign ");
    // if (isdown) {
    //     bg.texture = assets.spin_wheel_base2;
    // } else {
    //     bg.texture = assets.spin_wheel_base1;
    //     console.log("reset");
    // }
    var selectedSlice = Math.floor(Math.random() * 10)
    // var selectedSlice = 9
    var totalSlice = selectedSlice + 20
    var time = 5;
    console.log("selectedSlice=", selectedSlice);

    var fractionProgress = 1 / totalSlice;
    var nextSliceProgress = fractionProgress * 1.5;
    // console.log("nextSliceProgress=", nextSliceProgress);

    var destAngle = wheel.angle + (totalSlice * 36);
    var prevAnim = null;
    var anim = gsap.to(wheel, {
        angle: destAngle,
        duration: time,
        ease: "power2.out",
        onComplete: () => {
            // console.log("spin complete");
            winSound.play();
            showWin(selectedSlice);
        },
        onUpdate: () => {
            var progress = anim.ratio;
            // console.log("onUpdate progress", progress);
            if (progress >= nextSliceProgress) {
                // console.log("onUpdate nextSliceProgress", nextSliceProgress);
                nextSliceProgress += fractionProgress;
                var selectedTick = Math.floor(Math.random() * 4)
                tickSound[selectedTick].play();
                if (prevAnim) prevAnim.kill();
                wheelTop.angle = -10;
                prevAnim = gsap.to(wheelTop, {
                    angle: 0,
                    duration: time / (totalSlice)
                });
            }
        },
    });
    gsap.to(bg, {
        duration: time / (totalSlice),
        repeat: totalSlice,
        onRepeat: () => {
            if (isdown) {
                bg.texture = assets.spin_wheel_base2;
            } else {
                bg.texture = assets.spin_wheel_base1;
                // console.log("reset");
            }
            isdown = !isdown;
        },
    });
}

function onButtonOver() {
    this.isOver = true;
    if (this.isdown) {
        return;
    }
    this.texture = assets.button_over;
}

function onButtonOut() {
    this.isOver = false;
    if (this.isdown) {
        return;
    }
    this.texture = assets.button;
}

window.addEventListener('resize', () => {
    app.renderer.resize(window.innerWidth, window.innerHeight);

    const sprite = app.stage.children[0];
    sprite.width = app.renderer.width;
    sprite.height = app.renderer.height;
});
