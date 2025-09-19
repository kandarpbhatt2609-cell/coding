<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Seat Booking</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      position: relative;
      overflow-x: hidden;
      /* Gradient + image with absolute path */
       background:url('p3.jpg') no-repeat center center;

      background-size: cover;
    }

    body::before,
    body::after {
      content: "";
      position: absolute;
      border-radius: 50%;
      filter: blur(120px);
      z-index: -1;
    }

    body::before {
      top: -100px;
      left: -150px;
      width: 400px;
      height: 400px;
      background: rgba(255, 255, 255, 0.25);
    }

    body::after {
      bottom: -120px;
      right: -150px;
      width: 450px;
      height: 450px;
      background: rgba(255, 255, 255, 0.18);
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(255, 255, 255, 0.08);
     /* backdrop-filter: blur(4px); */
      z-index: 0;
    }

    header {
      display: flex;
      justify-content: flex-end;
      padding: 20px;
      font-size: 14px;
      position: relative;
      z-index: 1;
    }

    header a {
      margin-left: 20px;
      text-decoration: none;
      color: #000;
      font-weight: bold;
    }

    h1 {
      text-align: center;
      font-size: 28px;
      font-weight: 700;
      margin-top: 40px;
      color: #333;
      position: relative;
      z-index: 1;
    }

    .container {
      display: flex;
      justify-content: center;
      margin-top: 40px;
      gap: 40px;
      position: relative;
      z-index: 1;
    }

    .card {
      background-color: rgba(255, 255, 255, 0.85);
      width: 180px;
      height: 220px;
      border-radius: 10px;
      box-shadow: 4px 6px 10px rgba(0, 0, 0, 0.2);
      padding: 20px;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      backdrop-filter: blur(8px);
    }

    .card h3 {
      font-size: 16px;
      margin: 0;
    }

    .btn {
      margin-top: 10px;
      padding: 8px 16px;
      background: linear-gradient(to right, #7866d2, #e37979);
      border: none;
      border-radius: 20px;
      font-weight: bold;
      cursor: pointer;
      color: black;
      text-decoration: none;
      display: inline-block;
    }

    .btn:hover {
      background: #d8bfd8;
    }

    .middle-card {
      width: 220px;
      height: 240px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
      font-size: 18px;
    }

    .small-card {
      width: 140px;
      height: 200px;
    }
  </style>
</head>
<body>

  <div class="overlay"></div>

  <header>
    <a href="#">HOME</a>
    <a href="cc.php">SEARCH</a>
  </header>

  <h1>Book your <strong>Seat</strong> / <strong>Stage</strong>!</h1>

  <div class="container">
    <div class="card">
      <h3>LOGIN<br>FOR<br>FURTHER<br>JOURNEY!</h3>
      <a href="login.php" class="btn">Go to Login</a>
    </div>

    <div class="card middle-card">
      ABOUT US!
    </div>

    <div class="card small-card">
      <!-- Additional info -->
    </div>
  </div>

</body>
</html>
