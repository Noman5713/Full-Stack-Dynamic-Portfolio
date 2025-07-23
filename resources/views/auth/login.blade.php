<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Portfolio Admin</title>
    <style>
        body {
            min-height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg,rgb(146, 115, 146) 0%, #2575fc 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .loginFormContainer {
            background: rgba(255,255,255,0.95);
            padding: 40px 32px 32px 32px;
            border-radius: 18px;
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.18);
            min-width: 340px;
            max-width: 370px;
            width: 100%;
            position: relative;
            overflow: hidden;
            animation: fadeInCard 1s cubic-bezier(.39,.575,.56,1.000) both;
        }
        @keyframes fadeInCard {
            0% { opacity: 0; transform: translateY(40px) scale(0.95); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }
        h2 {
            text-align: center;
            margin-bottom: 28px;
            color: #222;
            letter-spacing: 1px;
            font-weight: 600;
        }
        form {
            margin-top: 10px;
        }
        .formGroup {
            position: relative;
            margin-bottom: 28px;
        }
        .formGroup input {
            width: 100%;
            padding: 14px 12px 14px 12px;
            border: 1.5px solid #d1d9e6;
            border-radius: 6px;
            font-size: 16px;
            background: #f7faff;
            transition: border 0.2s, box-shadow 0.2s;
            outline: none;
        }
        .formGroup input:focus {
            border-color: #2575fc;
            box-shadow: 0 0 0 2px rgba(37,117,252,0.12);
        }
        .formGroup label {
            position: absolute;
            left: 14px;
            top: 14px;
            color: #888;
            font-size: 15px;
            background: transparent;
            pointer-events: none;
            transition: 0.2s cubic-bezier(.4,0,.2,1);
            padding: 0 4px;
        }
        .formGroup input:focus + label,
        .formGroup input:not(:placeholder-shown) + label {
            top: -10px;
            left: 10px;
            font-size: 13px;
            color: #2575fc;
            background: #fff;
        }
        button[type="submit"] {
            width: 100%;
            padding: 12px 0;
            background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(37,117,252,0.10);
            transition: background 0.2s, transform 0.15s;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }
        button[type="submit"]:hover {
            background: linear-gradient(90deg, #2575fc 0%, #6a11cb 100%);
            transform: translateY(-2px) scale(1.03);
            box-shadow: 0 4px 16px rgba(37,117,252,0.18);
        }
        @media (max-width: 480px) {
            .loginFormContainer {
                min-width: 90vw;
                padding: 24px 8vw 20px 8vw;
            }
        }
    </style>
</head>
<body>
    <div class="loginFormContainer">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="formGroup">
                <input type="email" id="email" name="email" required placeholder=" " autocomplete="username">
                <label for="email">Email</label>
            </div>
            <div class="formGroup">
                <input type="password" id="password" name="password" required placeholder=" " autocomplete="current-password">
                <label for="password">Password</label>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
