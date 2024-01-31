<?php

include "admin/class/function.php";
$obj = new linkManagement();
$wheelHemsData = false;
if ( isset( $_GET['token'] ) ) {
    $tokenData = $obj->Verify( $_GET['token'] );
    if ( !$tokenData ) {
        echo "Invalid Token Link";
        die();
    } else {
        $jsonWinData = NULL;
        $customerData = $obj->displayCustomerById( $tokenData['customer_id'] );
        $wheel_hems_id = $customerData['wheel_hems_id'];
        if ( $wheel_hems_id != 0 ) {
            $wheelHemsData = $obj->displayWheelHemsrById( $wheel_hems_id );
            $jsonWinData = $wheelHemsData;
        }
        $jsonWinData = json_encode($jsonWinData);
        // else $jsonWinData = '';

        // echo "<h1>Customer Info</h1>";
        // print_r( $customerData );
                
        $wheelData = $obj->displayActiveWheelItems() ;
        $jsonWheelData = json_encode($wheelData);
        $jsonString = json_encode($customerData);
        // echo "<h1>Wheel Hems Info</h1>";
        if ( $wheelHemsData ) {
            // print_r( $wheelHemsData );
        } else {
            // echo "No Result Exit";
        }

        ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fortune Wheel For <?php echo $customerData['customer_name']; ?></title>
    <link rel="stylesheet" href="./output.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body style="font-family: Kanit">
    <main>
      <section class="mx-auto">
        <header class="py-3 md:py-4 lg:py-6 xl:py-8 bg-[#1A1B24]">
          <div
            class="px-4 md:px-6 lg:px-10 xl:px-20 2xl:px-[132px] max-w-[1440px] mx-auto flex items-center justify-between"
          >
            <!-- logo -->
            <a href="">
              <svg
                class="w-[80px] h-8 sm:w-24 sm:h-12 lg:w-[172px] lg:h-[48px]"
                viewBox="0 0 172 48"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
              >
                <rect width="171.484" height="48" fill="url(#pattern0)" />
                <defs>
                  <pattern
                    id="pattern0"
                    patternContentUnits="objectBoundingBox"
                    width="1"
                    height="1"
                  >
                    <use
                      xlink:href="#image0_90_4364"
                      transform="scale(0.00112867 0.00403226)"
                    />
                  </pattern>
                  <image
                    id="image0_90_4364"
                    width="886"
                    height="248"
                    xlink:href="data:image/png;base64,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"
                  />
                </defs>
              </svg>
            </a>

            <div class="hidden lg:flex items-center space-x-8">
              <a href="" class="text-base text-[#EEE]">About Us</a>
              <a href="" class="text-base text-[#EEE]">FAQ</a>
              <a href="" class="text-base text-[#EEE]">Contact</a>
            </div>

            <div class="">
              <button
                class="hidden lg:flex rounded-lg p-2 border border-[#FAFAFA] bg-[#1A1B24] space-x-2 text-[#FAFAFA]"
              >
                <svg
                  width="33"
                  height="24"
                  viewBox="0 0 33 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g clip-path="url(#clip0_90_4381)">
                    <path d="M0.257812 0H32.2578V24H0.257812" fill="#BD3D44" />
                    <path
                      d="M0.257812 2.76489H32.2578H0.257812ZM0.257812 6.44989H32.2578H0.257812ZM0.257812 10.1499H32.2578H0.257812ZM0.257812 13.8499H32.2578H0.257812ZM0.257812 17.5499H32.2578H0.257812ZM0.257812 21.2499H32.2578H0.257812Z"
                      fill="black"
                    />
                    <path
                      d="M0.257812 2.76489H32.2578M0.257812 6.44989H32.2578M0.257812 10.1499H32.2578M0.257812 13.8499H32.2578M0.257812 17.5499H32.2578M0.257812 21.2499H32.2578"
                      stroke="white"
                      stroke-width="1.85"
                    />
                    <path
                      d="M0.257812 0H18.4978V12.925H0.257812"
                      fill="#192F5D"
                    />
                  </g>
                  <defs>
                    <clipPath id="clip0_90_4381">
                      <rect
                        width="32"
                        height="24"
                        fill="white"
                        transform="translate(0.257812)"
                      />
                    </clipPath>
                  </defs>
                </svg>

                <div class="flex items-center space-x-1">
                  <p class="">English</p>
                  <svg
                    width="17"
                    height="16"
                    viewBox="0 0 17 16"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      d="M8.25784 11.3334C8.08717 11.3334 7.91648 11.2681 7.78648 11.1381L3.11982 6.47146C2.85915 6.21079 2.85915 5.78942 3.11982 5.52875C3.38048 5.26809 3.80186 5.26809 4.06252 5.52875L8.25784 9.72406L12.4531 5.52875C12.7138 5.26809 13.1352 5.26809 13.3959 5.52875C13.6565 5.78942 13.6565 6.21079 13.3959 6.47146L8.72919 11.1381C8.59919 11.2681 8.4285 11.3334 8.25784 11.3334Z"
                      fill="white"
                    />
                  </svg>
                </div>
              </button>

              <button class="block lg:hidden text-[#FAFAFA]">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M2 6C2 5.448 2.448 5 3 5H21C21.552 5 22 5.448 22 6C22 6.552 21.552 7 21 7H3C2.448 7 2 6.552 2 6ZM21 11H3C2.448 11 2 11.448 2 12C2 12.552 2.448 13 3 13H21C21.552 13 22 12.552 22 12C22 11.448 21.552 11 21 11ZM21 17H3C2.448 17 2 17.448 2 18C2 18.552 2.448 19 3 19H21C21.552 19 22 18.552 22 18C22 17.448 21.552 17 21 17Z"
                    fill="#FAFAFA"
                  />
                </svg>
              </button>
            </div>
          </div>
        </header>

        <div
          class="flex lg:flex-row flex-col space-y-10 sm:space-y-12  lg:space-y-0 lg:items-center lg:justify-between py-10 sm:py-12 md:py-12 lg:py-16 max-w-[1440px] px-4 md:px-6 lg:px-10 xl:px-20 2xl:px-[132px] 2xl:mx-auto"
        >
          <div>
            <h1
              class="text-[48px] sm:text-[64px] md:text-[72px] lg:text-[86px] 1100px:text-[96px] xl:text-[112px] font-bold leading-[110%] tracking-[-2.24px] text-[#1B1B1B] text-center lg:text-left"
            >
            <?php echo $customerData['customer_name']; ?> ,<br class="hidden lg:block" />
            <span id="spin-msg">Spin Your <br class="hidden lg:block" />Luck</span>
            </h1>

            <p id="spin-sub"
              class="text-center lg:text-left text-base sm:text-lg xl:text-xl font-medium lg:mt-6 lg:mb-10 mt-2 sm:mt-4 mb-4 sm:mb-6 text-[#5A5A5A]"
            >
              Win more than 10+ items in your spin
            </p>
            <button id="spin-btn" onclick="spin()"
              class="py-4 md:py-6 px-20 items-center lg:items-start text-base font-semibold text-[#332000] btn mx-auto lg:mx-0 block lg:inline-block"
            >
              Spin Now
            </button>
          </div>
          <div
            class="w-full lg:w-fit lg:h-fit flex items-center justify-center"
          >
          
          <div id="game-container" class="w-[650px] h-[700px]">
            <!-- <img
              src="./assets/spin-wheel.png"
              class="w-full md:w-[80%] lg:w-[580px] 1100px:w-[600px] xl:w-[650px] 2xl:w-[680px] !aspect-[1.07]"
              alt=""
            /> -->
          </div>
        </div>
      </section>
    </main>
    
    <script>
    var jsArray = <?php echo $jsonString; ?>;
    var jsWheelArray = <?php echo $jsonWheelData; ?>;
    var jsWinData = <?php echo $jsonWinData; ?>;
    
    console.log(jsWinData);
    </script>

    <script src="https://pixijs.download/v7.3.3/pixi.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.0/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.7/axios.min.js" integrity="sha512-NQfB/bDaB8kaSXF8E77JjhHG5PM6XVRxvHzkZiwl3ddWCEPBa23T76MuWSwAJdMGJnmQqM0VeY9kFszsrBEFrQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/@pixi/sound/dist/pixi-sound.js"></script>
    <script src="game.js"></script>
    
  </body>
</html>

        <?php
    }

}
else{
  echo "Invalid Link";
  die();
}


?>
