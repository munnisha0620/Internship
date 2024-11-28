<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Network Connection</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #000;
      color: #d3d3d3;
    }

    .container {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 100%;
      max-width: 1400px;
      height: 100vh;
      gap: 30px;
    }

    .image-container {
      background-image: url('https://www.microsoft.com/en-us/research/uploads/prod/2018/08/01_MSR_SIGCOMM_Data_Network_1400x788.png'); /* Replace with actual path to the uploaded image */
      background-size: cover;
      background-position: center;
      width: 90%;
      max-width: 1300px;
      height: 90vh;
      margin-right: 20px;
    }

    .text-box {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .text-box h1 {
      font-size: 2.5rem;
      font-weight: normal;
      margin-bottom: 20px;
    }

    .text-box a {
      position: relative;
      display: block;
      width: 150px;
      padding: 10px;
      margin-bottom: 10px;
      text-align: center;
      font-size: 1rem;
      color: #d3d3d3;
      background-color: #3d5bbf;
      border-radius: 10px;
      text-decoration: none;
      transition: background-color 0.3s, transform 0.3s ease;
      overflow: hidden;
    }

    .text-box a:hover {
      background-color: #0a1238;
      transform: scale(1.1);
    }

    .text-box a:active::after {
      content: '';
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.5);
      animation: ripple 0.6s linear;
      pointer-events: none;
    }

    @keyframes ripple {
      to {
        width: 300px;
        height: 300px;
        opacity: 0;
      }
    }

  </style>
</head>
<body>
  <div class="container">
    <div class="image-container"></div>
    <div class="text-box">
      <h1>Bringing You Closer to the World, Right from Home</h1>
      <a href="admin/provider_login.html">Network Provider</a>
      <a href="user/user_login.html">User</a>
    </div>
  </div>
</body>
</html>