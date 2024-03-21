
<style>

    .profile-container {
        width: 90%;
        margin: auto;
    }

    .title-head{
        text-align: center;
    }

    table {
        width: 100%;
        direction: rtl;
        border-collapse: collapse;
    }

    table thead tr th {
        border: 1px solid;
        border-left: none;
        border-right: none;
        padding: 10px;
        font-size: 20px;
    }

    table tbody tr td {
        text-align: center;
        color: white;
        padding: 7px;
        font-size: 13px;
        border: solid 1px black;
        border-left: none;
        border-right: none;
    }


</style>

<div class="profile-container">

    <h1 class='title-head'>محتوي القناة</h1>

    <table>

        <thead>

            <tr>

                <th>الفيديو</th>
                <th>مستوى العرض</th>
                <th>القيود</th>
                <th>التاريخ</th>
                <th>المشاهدات</th>
                <th>التعليقات</th>
                <th>نسبة الإعجاب</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach($videos as $video): ?>

            <tr>

                <td><a href="/profile/edit/url/<?= substr($video->url,0,-4) ?>"><img class="pic-video" src="<?= $video->UrlPic ?>" alt="" width="100px" height="100px"></a></td>
                <td><?= $video->video_status ?></td>
                <td>ما مِن قيود مفروضة</td>
                <td><?= $video->date ?></td>
                <td><?= $video->views ?></td>
                <td><?= $video->comments ?></td>
                <td><?= $video->likes ?></td>

            </tr>

            <?php endforeach; ?>
        </tbody>

    </table>

</div>