<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />

  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      width: 100%;
      font-family: Arial, sans-serif;
      background-color: #EAD196; 
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .wrapper {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      display: flex;
      width: 100%;
      max-width: 500px;
      align-items: center;
      justify-content: center;
      gap: 20px;
    }

    .input-field {
        width: 100%;
        height: 100%;
        border: none;
        outline: none;
        padding: 0.625em;
        box-sizing: border-box;
        font-size: 1.125em;
        background-color: #f0f0f0;
        box-shadow: inset 2px 2px 5px rgba(0, 0, 0, 0.1), inset -2px -2px 5px rgba(255, 255, 255, 0.7);
    }

    .text-input, .text-input-2 {
      position: relative;
      width: 100%;
      height: 50px; 
      border-radius: 5px; 
      margin-bottom: 10px;
    }

    .button {
      width: 100%;
      padding: 0.625em;
      font-size: 1.125em;
      border: none;
      border-radius: 0.25em;
      background-color: #007bff;
      color: white;
      cursor: pointer;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
      transition: box-shadow 0.3s ease; 
    }

    .button:hover {
      background-color: #0056b3;
      box-shadow: 0 8px 10px rgba(0, 0, 0, 0.2); 
    }

    .text-wrapper {
      text-align: center;
      font-size: 1.125em;
      margin: 1em 0; 
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <img src="{{ asset('images/logo.svg') }}" alt="Your Logo" style="width: 40%; height: auto; border-radius: 10px;" />
    @include('auth.formregister')
  </div>
</body>
</html>
