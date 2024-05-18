<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <style>
        * {
            font-family: "arial", sans-serif;
        }
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
            width: 90%;
            max-width: 1000px;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }
        .log-in-bar {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            flex: 3 1 0;
        }
        .log-in-image {
            width: 40%;
            height: auto;
            border-radius: 10px;
            flex: 5 1 0;
            cursor: pointer;
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

      .text-input, .overlap-group .div {
        position: relative;
        width: 100%;
        height: 3.125em;
        border-radius: 0.25em;
        margin-bottom: 0.625em;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f0f0f0;
        box-shadow: inset 2px 2px 5px rgba(0, 0, 0, 0.1), inset -2px -2px 5px rgba(255, 255, 255, 0.7);
      }

      .text-input label, .overlap-group .div label {
        position: absolute;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: text;
      }

      .input-field::placeholder {
        color: #aaa;
        font-size: 1.125em;
      }

      .text-wrapper, .text-wrapper-3 {
        text-align: center;
        font-size: 1.125em;
        margin-bottom: 0.625em;
      }

      .by-logging-in-you {
        text-align: center;
        font-size: 0.875em;
        margin: 0.625em 0;
        padding: 0.625em;
        line-height: 1.5;
      }

      .text-wrapper-3 {
        text-align: center;
        font-size: 1.125em;
        margin: 1em 0;
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

      .continue-with-google {
        display: block;
        text-align: center;
        margin-bottom: 0.625em;
        text-decoration: none;
        color: black;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
        padding: 0.625em;
        border-radius: 0.25em;
        background-color: white;
      }

      .continue-with-google:hover {
        box-shadow: 0 8px 10px rgba(0, 0, 0, 0.2);
        background-color: #f1f1f1;
      }

      .continue-with-google .overlap-2 {
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .flat-color-icons {
        width: 1.5em;
        margin-left: 0.5em;
      }

      .don-t-have-an a, .forgot-your-username a {
        color: #007bff;
        text-decoration: none;
      }

      .don-t-have-an a:hover, .forgot-your-username a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <img src="{{ asset('images/logo.svg') }}" alt="Your Image" class="log-in-image" />
      <div class="log-in-bar">
      <div class="text-wrapper">Log In</div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="text-input">
              <label>
                <input type="text" name="email" placeholder="Email*" class="input-field" value="{{ old('email') }}" required autofocus autocomplete="username" />
              </label>
            </div>
            <div class="div">
              <label>
                <input id="passwordInput" type="password" name="password" placeholder="Password*" class="input-field" required autocomplete="current-password" />
              </label>
            </div>
            <p class="by-logging-in-you">
              <span>By logging in, you agree to our </span><span class="text-wrapper-2">User Agreement</span><span> and acknowledge that you understand the </span><span class="text-wrapper-2">Privacy Policy</span><span>.</span>
            </p>
            <button type="submit" class="button">Log In</button>
            <p class="text-wrapper-3">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </form>
      </div>
    </div>
    <script>
      function togglePasswordVisibility() {
        const passwordInput = document.getElementById('passwordInput');
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;
      }
    </script>
  </body>
</html>
