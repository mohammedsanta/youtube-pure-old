

<style>

    .container-edit-video {
        width: 90%;
        height: auto;
        padding-bottom: 30px;
        background-color: #ff000085;
        display: flex;
        flex-direction: column;
        margin: auto;
    }

    .container-edit-video .video {
        /* width: 835px;
        height: 475px;
        margin: 45px auto; */
    }

    .container-edit-video .field {
        margin: 40px auto;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .container-edit-video .field label {
        font-size: 55px;
        font-weight: bold;
    }

    .container-edit-video .field .title {
        width: 500px;
        height: 45px;
    }

    .container-edit-video .field .description {
        width: 885px;
        height: 100px;
    }

    .container-edit-video .field select {
        width: 100px;
        height: 30px;
    }



</style>


<div class="container-edit-video">

    <video class="video" controls>
        <source src="/<?= $video->url ?>">
    </video>

    <div class="field">
        <label for="">Title</label>
        <input class="title" type="text" name="title" value="<?= $video->title ?>">
    </div>

    <div class="field">
        <label for="">Description</label>
        <input class="description" type="text" name="title" value="<?= $video->description ?>">
    </div>

    <div class="field">
        <label for="">Video Status</label>
        <select name="" id="">
            <option value="">Public</option>
            <option value="">Private</option>
        </select>
    </div>


</div>