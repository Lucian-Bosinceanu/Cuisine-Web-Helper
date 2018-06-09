<div id="sidebar">
    <button id="search-button" onclick="toggleSidebar()">Search</button>

    <div class="inner">

        <section class="search">
            <header class="subtitle">
                <h2>Search by title</h2>
            </header>

            <form method="post" action="#">
                <input type="text" name="recipe-search" id="recipe-search" placeholder="e.g. pizza" />
            </form>
        </section>

        <nav id="menu">
            <header class="subtitle">
                <h2>Search by tags</h2>
            </header>

            <form method="post" action="#">
                <input type="text" name="tag-search" id="tag-search" placeholder="e.g. salami" />
            </form>

            <ul>
                <li>
                    <input type="checkbox" id="pineapple" name="pineapple" checked>
                    <label for="pineapple">Pineapple</label>
                </li>
                <li>
                    <input type="checkbox" id="salami" name="salami" checked>
                    <label for="salami">Salami</label>
                </li>
                <li>
                    <input type="checkbox" id="potatoes" name="potatoes" checked>
                    <label for="potatoes">Potaotes</label>
                </li>
                <li>
                    <span id="opener1" class="opener" onclick="toggleDropdown('opener1')">Lifestyle</span>
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
                    <span id="opener2" class="opener" onclick="toggleDropdown('opener2')">Required time</span>
                    <ul>
                        <li>
                            <input type="checkbox" id="less-then-60-min" name="less-then-60-min">
                            <label for="less-then-60-min">&lt; 60 min</label>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <section class="search" class="alt">
            <header class="subtitle">
                <h2>Search article</h2>
            </header>

            <form method="post" action="#">
                <input type="text" name="recipe-search" id="article-search" placeholder="e.g. 5 ways to.." />
            </form>
        </section>
    </div>
</div>