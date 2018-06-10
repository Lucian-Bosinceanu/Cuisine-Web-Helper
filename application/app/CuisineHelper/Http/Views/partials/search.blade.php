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

            <form id="tags-form">
                <!-- <input type="text" name="tag-search" id="tag-search" placeholder="e.g. salami" />

                <ul id="selected-tags">
                </ul> -->
                <select class="form-control" multiple="multiple" id="tag-search">
                </select>

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
                <button id="tag-search-button">Search</button>
            </form>
        </nav>
    </div>
</div>