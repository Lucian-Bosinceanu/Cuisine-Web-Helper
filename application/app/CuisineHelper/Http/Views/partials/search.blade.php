<div id="sidebar">
    <button id="search-button">Search</button>

    <div class="inner">

        <section class="search">
            <header class="subtitle">
                <h2>Search by title</h2>
            </header>

            <!-- <form method="post" action="#"> -->
                <input type="text" name="recipeSearch" id="recipe-search" placeholder="e.g. pizza" />
            <!-- </form> -->
        </section>

        <nav id="menu">
            <header class="subtitle">
                <h2>Search by tags</h2>
            </header>

            <form method="post" action="#" id="tags-form">
                <input type="text" name="tag-search" id="tag-search" placeholder="e.g. salami" />

                <ul id="selected-tags">
                </ul>

                <ul id="tags-menu">
                    <li>
                        <span class="opener">Lifestyle</span>
                        <ul>
                            <li>
                                <input type="checkbox" id="vegetarian" name="vegetarian">
                                <label for="vegetarian">Vegetarian</label>
                            </li>
                            <li>
                                <input type="checkbox" id="vegan" name="vegan">
                                <label for="vegan">Vegan</label>
                            </li>
                            <li>
                                <input type="checkbox" id="omnivorus" name="omnivorus">
                                <label for="omnivorus">Omnivorus</label>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <span class="opener">Required time</span>
                        <ul>
                            <li>
                                <input type="checkbox" id="less-then-60-min" name="less-then-60-min">
                                <label for="less-then-60-min">&lt; 60 min</label>
                            </li>
                        </ul>
                    </li>
                </ul>
                <button type="submit">Search</button>
            </form>
        </nav>

        <section class="search" class="alt">
            <header class="subtitle">
                <h2>Search article</h2>
            </header>

            <!-- <form method="post" action="#"> -->
                <input type="text" name="articleSearch" id="article-search" placeholder="e.g. 5 ways to.." />
            <!-- </form> -->
        </section>
    </div>
</div>