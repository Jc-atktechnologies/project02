<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>

        <link href="../resources/css/bootstrap.css" rel="stylesheet"/>

<style> 

html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

</style>

    </head>

        <body class="text-center">

            <main class="form-signin w-50 m-auto">
                <form>
                    <img class="mb-4" src="https://secureservercdn.net/50.62.195.83/uv4.862.myftpupload.com/wp-content/uploads/2021/03/Authentik_LogoCoul.png?time=1655079972" alt="" width="300" height="185">
                    <h1 class="h3 mb-3 fw-normal">Connectez-vous</h1>

                    <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" >
                    <label for="floatingInput">Nom d'utilisateur</label>
                    </div>
                    <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" >
                    <label for="floatingPassword">Mot de passe</label>
                    </div>

                    <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Se souvenir de moi
                    </label>
                    </div>
                    <a <button class="w-50 btn btn-lg btn-primary" href="accueil" type="submit">s'authentifier</button> </a>
                    <p class="mt-5 mb-3 text-muted">&copy; 2022-2023</p>
                </form>
            </main>

        </body>
</html>
