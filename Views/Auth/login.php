
<style>

    .box {
        width: 600px;
        height: 350px;
        background-color: red;
        margin: 125px auto;
        border-radius: 20px;
    }

    form {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 65px;
    }

    .box form label {
        font-size: 40px;
        font-weight: bold;
        color: white;
        text-align: center;
        padding-right: 30px;
    }

    .box form .input {
        width: 320px;
        height: 27px;
        margin: auto;
        border-radius: 10px;
        border: solid 1px red;
    }

    .box form input[type='submit'] {
        width: 100px;
        height: 30px;
        border: none;
        border-radius: 20px;
    }

</style>

<div class="box">
    <form method="POST">
        <div class="field">
            <label for="">Username</label>
            <input class="input" type="text" name="" id="">
        </div>

        <div class="field">
            <label for="">Password</label>
            <input class="input" type="text" name="" id="">
        </div>

        <input type="submit" value="Login">
    </form>
</div>