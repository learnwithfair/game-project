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

var results = [];
var wheelArray;
var wheelContainer;
var imgPath = "http://localhost/rabbi/FortuneWheelAdmin/admin/upload/wheel-img/"

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

    createSlice();



    PIXI.Assets.add('spin_wheel_base', '../FortuneWheelAdmin/assets/spin_wheel_base.png');
    PIXI.Assets.add('spin_wheel_base1', '../FortuneWheelAdmin/assets/spin_wheel_base1.png');
    PIXI.Assets.add('spin_wheel_base2', '../FortuneWheelAdmin/assets/spin_wheel_base2.png');
    PIXI.Assets.add('spin', '../FortuneWheelAdmin/assets/spin.png');
    PIXI.Assets.add('top', '../FortuneWheelAdmin/assets/top.png');
    PIXI.Assets.add('circle', '../FortuneWheelAdmin/assets/circle.png');
    PIXI.Assets.add('winSound', '../FortuneWheelAdmin/assets/dice_win.mp3');
    PIXI.Assets.add('tick1', '../FortuneWheelAdmin/assets/tick1.mp3');
    PIXI.Assets.add('tick2', '../FortuneWheelAdmin/assets/tick2.mp3');
    PIXI.Assets.add('tick3', '../FortuneWheelAdmin/assets/tick3.mp3');
    PIXI.Assets.add('tick4', '../FortuneWheelAdmin/assets/tick4.mp3');
    // PIXI.Assets.add('button_over', 'assets/button_over.png');

    var assetKeys = ['spin_wheel_base', 'spin', 'top', 'circle', 'spin_wheel_base1', 'spin_wheel_base2', 'winSound', 'tick1', 'tick2', 'tick3', 'tick4'];
    for (let i = 1; i < 9; i++) {
        PIXI.Assets.add('result' + i, '../FortuneWheelAdmin/assets/result' + i + '.png');
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


        const numberOfSlices = 8;
        const sliceColors = [0xFF0000, 0xFFA500, 0xFFFF00, 0x008000, 0x0000FF, 0x4B0082, 0x9400D3, 0xFFC0CB];

        wheelContainer = new PIXI.Container();
        wheelContainer.position.set(app.renderer.width / 2, 335);
        app.stage.addChild(wheelContainer);

        // Function to draw a slice with image and text
        function drawSlice(index, totalSlices, radius, color, text_color, imageSrc, labelText) {
            const startAngle = (index / totalSlices) * Math.PI * 2;
            const endAngle = ((index + 1) / totalSlices) * Math.PI * 2;

            const sliceContainer = new PIXI.Container();

            // Draw the slice
            const slice = new PIXI.Graphics();
            slice.beginFill(color);
            slice.moveTo(0, 0);
            slice.arc(0, 0, radius, startAngle, endAngle);
            slice.lineTo(0, 0);
            slice.endFill();

            // Add the slice graphics to the container
            sliceContainer.addChild(slice);

            var degreeStart = startAngle * (180 / Math.PI);
            var degreeEnd = endAngle * (180 / Math.PI);

            // console.log("degreeStart="+degreeStart);
            // console.log("degreeEnd="+degreeEnd);

            // Add the image to the slice
            const image = PIXI.Sprite.from(imageSrc);
            image.scale.set(.22);
            image.anchor.set(0, 0.5);
            image.pivot.x = -480;
            // image.width = radius * 0.8;
            image.position.set(0, 0);
            image.angle = (degreeStart + degreeEnd) / 2 - 5;
            // image.height = radius * 0.8;
            sliceContainer.addChild(image);

            // Add the text to the slice
            const textStyle = new PIXI.TextStyle({
                fontFamily: 'Kanit',
                fontSize: 13,
                // fontWeight: 'bold',
                fill: text_color,
                align: 'center',
                wordWrap: true,
                wordWrapWidth: 150,
            });
            const text = new PIXI.Text(labelText, textStyle);
            text.anchor.set(0, 0.5);
            text.pivot.x = -60;
            text.position.set(0, 0);
            text.angle = image.angle + 15;
            // text.rotation = (startAngle + endAngle) / 2;

            sliceContainer.addChild(text);

            // Rotate the slice container to the correct angle
            // sliceContainer.rotation = startAngle;

            // Add the slice container to the wheel container
            wheelContainer.addChild(sliceContainer);
        }

        // Draw each slice with image and text
        for (let i = 0; i < wheelArray.length; i++) {
            drawSlice(i, wheelArray.length, 210, wheelArray[i].color, wheelArray[i].text_color, imgPath + wheelArray[i].image, wheelArray[i].name);
        }


        var wheelCircle = PIXI.Sprite.from(assets.circle);
        wheelCircle.anchor.set(0.5);
        wheelCircle.x = app.screen.width * 0.5;
        wheelCircle.y = app.screen.height * .5;
        // app.stage.addChild(wheelCircle);
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


        ifSpinned();
        return;

    });


});
function spin() {
    onButtonDown();
}
function showWin(n) {
    // var result = sliceToResult(n);
    var result = wheelArray[n];
    console.log("result", result);


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

    var top = PIXI.Sprite.from(imgPath + result.image);
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

    
    var spinSubtitle = document.getElementById('spin-sub');
    spinSubtitle.innerHTML = jsWinData.details;

    var spinMsg = document.getElementById('spin-msg');
    spinMsg.innerHTML = 'You Won ' + results[n].name;

    var spinBtn = document.getElementById('spin-btn');
    spinBtn.style.display = 'none';
}

function createSlice() {
    var originalArray = JSON.parse(jsWheelArray);
    originalArray.forEach(item => {
        item.percent = parseInt(item.percent);
    });
    var sortedArray = originalArray.sort(function (a, b) {
        return b.percent - a.percent;
    });
    var len = originalArray.length;
    for (var i = 0; i < len; i++) {
        if (i % 2 === 0) {
            results.push(sortedArray.pop());
        } else {
            results.push(sortedArray.shift());
        }
    }
    results = results.map(function (item) {
        return { name: item.name, image: item.image, color: parseInt(item.color_code), text_color: parseInt(item.text_color), id: parseInt(item.id) };
    });
    wheelArray = results;
    console.log("wheelArray", wheelArray);
}

function sliceToResult(n) {
    // var results = [
    //     { name: 'McLaren GT', color: 0xF67A3E, id: 1 },
    //     { name: 'Mercedes-Benz GWagon', color: 0x30B676, id: 2 },
    //     { name: 'Cash Bonus 100', color: 0xC9E266, id: 8 },
    //     { name: 'Hublot Blue watch', color: 0xFF6060, id: 4 },
    //     { name: 'Audi RS 5 Coupé', color: 0xFFFFFF, id: 3 },
    //     { name: 'iPhone 15 Pro Max', color: 0x2EB574, id: 6 },
    //     { name: 'Cash Bonus 50', color: 0xF67A3E, id: 8 },
    //     { name: '10 ounces of gold', color: 0xC9E266, id: 5 },
    //     { name: 'Cash Bonus 500', color: 0xFF6060, id: 7 },
    //     { name: 'Cash Bonus 30', color: 0xFFFFFF, id: 8 },
    // ]
    return results[n];
}

function ifSpinned() {
    if (jsWinData != null) {
        var id = parseInt(jsWinData.id);
        const matchedObject = results.find(obj => obj.id === id);
        if (matchedObject) {
            const position = results.indexOf(matchedObject);
            console.log(`Object with id ${id} is at position ${position}`);
            showWin(position);
        } else {
            console.log('Object not found in results');
        }
    }
}

function getResult() {
    const currentUrl = window.location.search;
    const urlParams = new URLSearchParams(currentUrl);
    const token = urlParams.get('token');

    // console.log('token', token);

    const apiUrl = 'http://localhost/rabbi/FortuneWheelAdmin/generate_result.php?token=' + token;

    // Make a request to the API
    axios.get(apiUrl)
        .then(response => {
            const apiResponse = jsWinData = response.data;

            console.log("apiResponse: ", apiResponse);
            apiResponse.id = parseInt(apiResponse.id);

            const matchedObject = results.find(obj => obj.id === apiResponse.id);

            if (matchedObject) {
                // Retrieve the position (index) of the matched object in results
                const position = results.indexOf(matchedObject);

                // Log the result
                console.log(`Object with id ${apiResponse.id} is at position ${position}`);
                runSpin(position)
                // return position;
            } else {
                console.log('Object not found in results');
            }
        })
        .catch(error => {
            console.error('Error fetching data from the API', error);
        });

}

function onButtonDown() {
    getResult();
}

function runSpin(selectedSlice) {

    if (!selectedSlice) {
        return;
    }
    // var selectedSlice = 9
    var totalSlice = selectedSlice + 3 + wheelArray.length * 2;
    var time = 5;
    console.log("selectedSlice=", selectedSlice);

    var fractionProgress = 1 / totalSlice;
    var nextSliceProgress = fractionProgress * 1.5;
    // console.log("nextSliceProgress=", nextSliceProgress);

    var destAngle = (totalSlice * 36);
    var prevAnim = null;
    var anim = gsap.to(wheelContainer, {
        angle: -destAngle,
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
