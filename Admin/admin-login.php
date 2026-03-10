<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login - Al Mesbah Al Modie Foundation</title>
    <link rel="stylesheet" href="adminstyle.css?v=20260310e" />
    <script src="Admin script.js?v=20260310e" defer></script>
  </head>
  <body>
    <div class="login-bg">
      <div class="login-box">
        <h2>Admin Login</h2>
        <p>Al Mesbah Al Modie Foundation<br>Charity and humanitarian aid in Egypt</p>
        <form onsubmit="return validateLoginForm()">
          <input
            type="text"
            id="username"
            name="username"
            placeholder="Username"
          />
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Password"
          />

          <button type="submit">Login</button>
        </form>
      </div>
    </div>
  </body>
</html>
