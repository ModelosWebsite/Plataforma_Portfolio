<style>
    :root{
        --hero: url({{isset($imageHero->image) ? "/storage/".$imageHero->image : ''}});
        --start: url({{isset($start->image) ? "/storage/".$start->image : ''}});
        --footer: url({{isset($footer->image) ? "/storage/".$footer->image : ''}});
    }

    .hero {
        background-image: var(--hero);
    }

    main .section-counter {
        background-image: var(--start);
    }

    main .imgfooter {
        background-image: var(--footer);
    }

</style>