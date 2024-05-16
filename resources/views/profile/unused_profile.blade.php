<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" href="assets/css/dashboard.css" type="text/css">
    <link rel="stylesheet" href="assets/css/all.css" type="text/css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('layouts.navigation')
    
</head>
<body>
    
<div class="my-account-page-profile-page-personal-info">
  <div class="boxSamping">
    <div class="boxSampingJudul">
      <h1>"Username"</h1>
      <style>
        .boxSampingJudul h1 {
          font-weight: 600;
          color: #333;
          margin: 0;
          align-items: center;
          display: flex;
          justify-content: center;
          margin-top: 1vw;
          font-size: 1.5vw;
        }

      </style>
    </div>
    <div class="historiTransaksi">
      <h1>Transaction History</h1>
      <style>
        .historiTransaksi h1 {
          font-weight: 600;
          color: #333;
          margin: 0;
          align-items: center;
          display: flex;
          justify-content: left;
          margin-top: 1vw;
          margin-left: 1vw;
          font-size: 1vw;
        }
      </style>


      <div class="boxHistori">
        <!-- buat sebuah bg kotak  -->
        <style>
            .boxHistori {
              background-color: #fff;
              width: 12.7vw;
              height: 7vw;
              margin-top: 0vw;
              margin-left: 1vw;
              border-radius: 1vw;
              /* berikan shadow dengan intensitas rendah*/
              box-shadow: 0 0 0.5vw 0.1vw rgba(0, 0, 0, 0.1);
            }
        </style>
      </div>

    </div>

    <div class="payment">
      <h1>Payment and Invoices</h1>
      <style>
        .payment h1 {
          font-weight: 600;
          color: #333;
          margin: 0;
          align-items: center;
          display: flex;
          justify-content: left;
          margin-top: 1vw;
          margin-left: 1vw;
          font-size: 1vw;
        }
      </style>
      <div class="boxPayment">
        <style>
            .boxPayment {
              background-color: #fff;
              width: 12.7vw;
              height: 7vw;
              margin-top: 0vw;
              margin-left: 1vw;
              border-radius: 1vw;
              /* berikan shadow dengan intensitas rendah*/
              box-shadow: 0 0 0.5vw 0.1vw rgba(0, 0, 0, 0.1);
            } 
        </style>
      </div>
    </div>
    <div class="Favorite">
      <h1>Favorite and Wishlist</h1>
      <style>
        .Favorite h1 {
          font-weight: 600;
          color: #333;
          margin: 0;
          align-items: center;
          display: flex;
          justify-content: left;
          margin-top: 1vw;
          margin-left: 1vw;
          font-size: 1vw;
        }
      </style>
      <div class="boxFavorite">
        <style>
            .boxFavorite {
              background-color: #fff;
              width: 12.7vw;
              height: 7vw;
              margin-top: 0vw;
              margin-left: 1vw;
              border-radius: 1vw;
              /* berikan shadow dengan intensitas rendah*/
              box-shadow: 0 0 0.5vw 0.1vw rgba(0, 0, 0, 0.1);
            } 
        </style>
      </div>
    </div>
    <div class="Help">
      <h1>Need Any Help?</h1>
      <style>
        .Help h1 {
          font-weight: 600;
          color: #333;
          margin: 0;
          align-items: center;
          display: flex;
          justify-content: left;
          margin-top: 1vw;
          margin-left: 1vw;
          font-size: 1vw;
        }
      </style>
      <div class="boxHelp">
        <style>
            .boxHelp {
              background-color: #fff;
              width: 12.7vw;
              height: 7vw;
              margin-top: 0vw;
              margin-left: 1vw;
              border-radius: 1vw;
              /* berikan shadow dengan intensitas rendah*/
              box-shadow: 0 0 0.5vw 0.1vw rgba(0, 0, 0, 0.1);
            } 
        </style>
      </div>
    </div>






  </div>
  












  <div class="boxTengah">
    <!-- judul -->
    <div class="boxTengahTitle">
      <h1>Personal Info</h1>
      <style>
        .boxTengahTitle h1 {
          font-weight: 600;
          color: #333;
          margin: 0;
          align-items: center;
          display: flex;
          justify-content: center;
          margin-top: 1vw;
          font-size: 1.5vw;
        }
      </style>
    </div>
    <!-- Edit profile pictur -->
    <div class="profilePicture">
      <div class="profilePictureTitle">
        <h1>Edit Profile Picture</h1>
        <style>
          .profilePictureTitle h1 {
            font-weight: 600;
            color: #333;
            margin: 0;
            align-items: center;
            display: flex;
            justify-content: left;
            margin-top: 1vw;
            margin-left: 2.5vw;
            font-size: 1vw;
          }
        </style>
      </div>

      <div class="tempatGambar">
        <img src="assets/img/ProfilePicture.png" class="profilePicture">
        <style>
          .tempatGambar img {
            width: 10vw;
            height: 10vw;
            margin-top: 0.5vw;
            margin-left: 2vw;
            background-color: #fff;
            border: 0.2vw solid #ead196;
            box-shadow: 0 0 0.5vw 0.1vw rgba(0, 0, 0, 0.1);
            
          }
        </style>
      </div>

      <div class="editProfilePicture">
        <button class="editProfilePictureButton">Edit Profile Picture</button>
        <!-- ketika tombol di pencet, maka user diminta untuk up foto -->
        
        <style>
          .editProfilePictureButton {
            background-color: #ead196;
            color: #333;
            border: none;
            border-radius: 0.5vw;
            padding: 0.5vw 1vw;
            font-size: 1vw;
            margin-top: 1vw;
            margin-left: 2vw;
            box-shadow: 0 0 0.5vw 0.1vw rgba(0, 0, 0, 0.1);
          }
        </style>
      </div>
    </div>
    <!-- personal info -->
    <div class="informasi">
      <h1>User Personal Info</h1>
      <style>
        .informasi h1 {
          font-weight: 600;
          color: #333;
          margin: 0;
          align-items: center;
          display: flex;
          justify-content: left;
          margin-top: -15.58vw;
          margin-left: 18vw;
          font-size: 1vw;
        }
      </style>
      <div class="datapersonal">
        <p>Name : </p>
        <p>Email : </p>
        <p>Phone Number : </p>
        <p>Address : </p>
        <p>City : </p>
        <p>Country : </p>
        <p>Postal Code : </p>
      </div>
      <style>
        .datapersonal p {
          font-weight: 400;
          color: #333;
          margin: 0;
          align-items: center;
          display: flex;
          justify-content: left;
          margin-top: 1vw;
          margin-left: 19vw;
          font-size: 1vw;
        }
      </style>
    </div>






  </div>
  



</div>

</body>


