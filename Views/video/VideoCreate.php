

<style>

    .video-create-container {
        width: 500px;
        height: 350px;
        background-color: red;
        margin: auto;
        position: relative;
        top: 145px;
        border-radius: 20px;
    }

    form {
        width: 100%;
        height: 100%;
        display: grid;
        justify-content: center;
        align-items: center;
    }

    .video-create-container .field {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .video-create-container .field label {
        font-size: 25px;
        font-weight: bold;
        color: white;
    }

    .video-create-container .field input[type='text'] {
        margin-top: 13px;
        border-radius: 10px;
        border-color: red;
    }
    .video-create-container .field input[type='file'] {
        margin-top: 25px;
    }

    .video-create-container input[type='submit'] {
        width: 110px;
        height: 25px;
        border-radius: 10px;
        border-color: red;
        margin: auto;
    }

</style>


<div class="video-create-container">

        <?php if(app()->session->hasFlash('errors')): ?>
        <?= @app()->session->getFlash('success')[0];endif; ?>

    <form method="POST" enctype="multipart/form-data">

        <?php if(app()->session->hasFlash('errors')): ?>
        <?= @app()->session->getFlash('errors')['Title'][0];endif; ?>
            
        <div class="field">
            <label for="">Title</label>
            <input type="text" name="Title" id="">
        </div>

        <?php if(app()->session->hasFlash('errors')): ?>
        <?= @app()->session->getFlash('errors')['PictureVideo'][0];endif; ?>
            
        <div class="field">
            <label for="">Picture Video</label>
            <input type="file" name="PictureVideo" id="">
        </div>

        <div class="field">
            <label for="">Video</label>
            <input type="file" name="Video" id="">
        </div>

        <input type="hidden" name="MAX_FILE_SIZE" value="2048576" />
        
        <input type="submit" value="Upload">
    </form>
</div>