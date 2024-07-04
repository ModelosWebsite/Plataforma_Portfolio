<style>
    :root{
        --hero: url({{isset($imageHero->image) ? "/storage/".$imageHero->image : ''}});
        --start: url({{isset($start->image) ? "/storage/".$start->image : ''}});
        --footer: url({{isset($footer->image) ? "/storage/".$footer->image : ''}});
        --shoppingCart: url({{isset($shoppingCart->image) ? "/storage/".$shoppingCart->image : ''}});
        --shopping: url({{isset($shopping->image) ? "/storage/".$shopping->image : ''}});
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