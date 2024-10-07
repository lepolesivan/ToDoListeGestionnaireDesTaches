<?php
require_once(__DIR__ . '/partials/head.php');
?>
<h1>Task'N'Kids</h1>

<?php
if (isset($_SESSION['user']) && $_SESSION['user']['idRole'] == 1) {
?>
    <h2>Tâche à venir non assignée</h2>
    <?php
    if (isset($arrayTasks)) {
        foreach ($arrayTasks as $task) {
            $dateStartDay = date_create($task->getStartTask());
            $dateStopDay = date_create($task->getStopTask());
    ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $task->getTitle() ?></h5>
                    <p class="card-text"><?= $task->getContent() ?></p>
                    <p class="card-text">Du <?= date_format($dateStartDay, 'd-m-Y à H:i') ?> au <?= date_format($dateStopDay, 'd-m-Y à H:i') ?></p>
                    <div class="d-flex justify-content-around">
                        <a href="/task?id=<?= $task->getId() ?>" class="btn btn-primary">Voir plus</a>
                        <a href="/editTask?id=<?= $task->getId() ?>" class="btn btn-warning">Modifier</a>
                    </div>
                    <div class="d-flex justify-content-around">
                        <form action="/deleteTask" method="POST">
                            <input type="hidden" name="id" id="id" value="<?= $task->getId() ?>">
                            <button type="submit" class="btn btn-danger pt-3">Suprimer la tâche</button>
                        </form>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
    <h2>Tâche à venir assignée</h2>
    <?php
    if (isset($arrayTasksByUsers)) {
        foreach ($arrayTasksByUsers as $task) {
            $dateStartDay = date_create($task->getStartTask());
            $dateStopDay = date_create($task->getStopTask());
    ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $task->getTitle() ?></h5>
                    <p class="card-text"><?= $task->getContent() ?></p>
                    <p class="card-text">Du <?= date_format($dateStartDay, 'd-m-Y à H:i') ?> au <?= date_format($dateStopDay, 'd-m-Y à H:i') ?></p>
                    <p class="card-text">Assigné à : <?= $task->getPseudo() ?></p>
                    <a href="/task?id=<?= $task->getId() ?>" class="btn btn-primary">Voir plus</a>
                    <a href="/editTask?id=<?= $task->getId() ?>" class="btn btn-warning">Modifier</a>
                    <form action="/deleteTaskAndTodo" method="POST">
                        <input type="hidden" name="id" id="id" value="<?= $task->getId() ?>">
                        <button type="submit" class="btn btn-danger pt-3">Suprimer la tâche</button>
                    </form>
                </div>
            </div>
    <?php
        }
    }
}
if (isset($_SESSION['user']) && $_SESSION['user']['idRole'] == 2) {
    ?>
    <h2>Tâche à venir non assignée</h2>
    <?php
    if (isset($arrayTasks)) {
        foreach ($arrayTasks as $task) {
            $dateStartDay = date_create($task->getStartTask());
            $dateStopDay = date_create($task->getStopTask());
    ?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $task->getTitle() ?></h5>
                    <p class="card-text"><?= $task->getContent() ?></p>
                    <p class="card-text">Du <?= date_format($dateStartDay, 'd-m-Y à H:i') ?> au <?= date_format($dateStopDay, 'd-m-Y à H:i') ?></p>
                    <a href="/task?id=<?= $task->getId() ?>" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
<?php
        }
    }
}
require_once(__DIR__ . '/partials/footer.php');
?>