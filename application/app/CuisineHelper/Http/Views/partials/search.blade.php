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

        <nav class="menu">
            <header class="subtitle">
                <h2>Search by tags</h2>
            </header>

            <form id="tags-form">
                <select class="form-control" multiple="multiple" id="tag-search">
                </select>

                <ul id="tags-menu">
                    <li>
                        <span class="opener" id="time-select">Required time</span>
                        <ul>
                            <li>
                                <input type="checkbox" id="less-then-30-min" name="time-30">
                                <label for="less-then-30-min">&lt; 30 min</label>
                            </li>
                            <li>
                                <input type="checkbox" id="less-then-60-min" name="time-60">
                                <label for="less-then-60-min">&lt; 60 min</label>
                            </li>
                            <li>
                                <input type="checkbox" id="less-then-90-min" name="time-90">
                                <label for="less-then-90-min">&lt; 90 min</label>
                            </li>
                            <li>
                                <input type="checkbox" id="less-then-120-min" name="time-120">
                                <label for="less-then-120-min">&lt; 120 min</label>
                            </li>
                            <li>
                                <input type="checkbox" id="less-then-150-min" name="time-150">
                                <label for="less-then-150-min">&lt; 150 min</label>
                            </li>
                            <li>
                                <input type="checkbox" id="greater-then-180-min" name="time-180">
                                <label for="greater-then-180-min">&gt; 180 min</label>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <span class="opener" id="difficulty-select">Difficulty</span>
                        <ul>
                            <li>
                                <input type="checkbox" id="very-easy" name="difficulty-1">
                                <label for="very-easy">Very Easy</label>
                            </li>
                            <li>
                                <input type="checkbox" id="easy" name="difficulty-2">
                                <label for="easy">Easy</label>
                            </li>
                            <li>
                                <input type="checkbox" id="medium" name="difficulty-3">
                                <label for="medium">Medium</label>
                            </li>
                            <li>
                                <input type="checkbox" id="hard" name="difficulty-4">
                                <label for="hard">Hard</label>
                            </li>
                            <li>
                                <input type="checkbox" id="very-hard" name="difficulty-5">
                                <label for="very-hard">Very Hard</label>
                            </li>
                        </ul>
                    </li>
                </ul>
                <button id="tag-search-button">Search</button>
            </form>
        </nav>

        <nav class="menu">
            <header class="subtitle">
                <h2>Food restrictions</h2>
            </header>

            <form id="restrictions-form">
                <select class="form-control" multiple="multiple" id="restrictions-search">
                </select>

                <button id="restrictions-search-button">Search</button>
            </form>
        </nav>
    </div>
</div>