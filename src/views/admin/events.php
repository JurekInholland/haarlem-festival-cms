<style>
.event-grid {
    overflow: hidden;
    display: grid;
    width: 100%;
    grid-template-rows: 1fr;
    grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));;
    grid-auto-flow: row;
    grid-gap: 1rem;
    max-width: 100%;
    /* min-width: 530px; */
    padding-bottom: 3rem;
    /* max-height: 600px; */
}

.event {
    height: 100%;

    margin: 0;

    display: flex;
    flex-flow: column; 
    justify-content: space-between; 
    z-index: 10;

}


.event-info {
    display: flex;
    margin: 0;
    overflow: hidden;
    max-height: 50px;
}

.event-info li {
    margin: 0;
    margin-right: 5px;
}

.event-info li:last-of-type {
    color: red;
    margin: 0 auto;
    margin-right: 0px;
    font-weight: bold;
    font-size: 1.25rem;
    line-height: 1.25rem;
}
.category {
    font-family: Rockwell, Georgia;
}
/* a, a:hover {
    text-decoration: none;
    color: unset;
} */

/* TODO: clean up */
.event_section, .event_section:hover {
    padding: .75rem;

    background-color: white;
    text-decoration: none;
    color: unset;

    border: 1px solid transparent;
    border-radius: 5px;
}

</style>

<form method="POST" action="/admin/events">

</form>

<section class="event-grid">

    <?php foreach ($events as $key => $event) :
    // TODO $category = App:getCurrentCategory
    ?>

        <a class="event_section" href="/admin/event/<?= $event->getSlug(); ?>">
            <section class="event">
                <h2><?= $event->getName(); ?></h2>
                <p><?= $event->getDescription(); ?></p>
                <ul class="event-info">
                    <?php
                    if ($event->getType() == 2) {
                        echo "<li>{$event->getLocation()} Sessions:</li>";
                    } else {
                        echo "<li>{$event->getStartDay()} </li>";

                    }
                    ?>
                    <li style="font-weight: bold;"><?= $event->getStartTime(); ?> - <?= $event->getEndTime(); ?></li>
                    <?php
                    if ($event->getType() < 2) {
                        echo "<li>{$event->getAddress()}</li>";
                    }
                    if ($event->getType() == 0) {
                        echo "<li>{$event->getLocation()}</li>";
                    }
                    
                    ?>
                    <li style="color: <?= $event->getColor(); ?>" class="category"><?= $event->getCategory(); ?></li>
                </ul>
            </section>
        </a>
    <?php endforeach; ?>

</section>