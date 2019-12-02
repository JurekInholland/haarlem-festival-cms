<style>
.event-grid {
    overflow: hidden;
    display: grid;
    width: 100%;
    grid-template-rows: 1fr;
  grid-template-columns: repeat(auto-fill, minmax(425px, 1fr));;
  grid-auto-flow: row;
    grid-gap: 1rem;
    max-width: 100%;
    /* max-height: 600px; */
}

.event {
    background-color: white;
    padding: .5rem;

    margin: 0;
    /* min-width: 465px; */

    display: flex;
    flex-flow: column; 
    justify-content: space-between; 
}


.event-info {
    display: flex;
    margin: 0;
    /* align-self: flex-end;
    justify-self: flex-end; */
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

a, a:hover {
    text-decoration: none;
    color: unset;
}
/* @media screen and (min-width: 930px) {
    .event-grid {
        grid-template-columns: 1fr 1fr;
    }
} */


</style>

<section class="event-grid">

    <?php foreach ($events as $key => $event) : ?>

        <a href="/event/<?= $event->getSlug(); ?>">
            <section class="event">
                <h2><?= $event->getTitle(); ?></h2>
                <p><?= $event->getDescription(); ?></p>
                <ul class="event-info">
                    <li><?= $event->getDate(); ?></li>
                    <li style="font-weight: bold;"><?= $event->getStartTime(); ?> - <?= $event->getEndTime(); ?></li>
                    <li> | <?= $event->getLocation(); ?></li>
                    <li style="color: <?= $event->getColor(); ?>" class="category"><?= $event->getCategory(); ?></li>
                </ul>
            </section>
        </a>
    <?php endforeach; ?>

</section>