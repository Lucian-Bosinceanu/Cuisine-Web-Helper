@extends('layouts.app')

@section('title', 'Account and Preferences')

@section('head')
    <script src="{{ js('main') }}"></script>
@endsection

@section('content')
    @include('partials.logged-sidemenu')
    <div id="main">
        <div class="inner">
            <header id="header">
                <h1 class="title"><strong>Account</strong> &amp; Preferences</h1>
                @include('partials.logged-menu')
            </header>

            <section class="recipe-section">
                <div class="content">
                    <form action="#" method="POST" id="change-credentials">
                        <label for="change-old-username">Change username:</label>
                        <input type="text" name="old-username" id="change-old-username" placeholder="current username" required>
                        <input type="text" name="new-username" id="change-new-username" placeholder="new username" disabled="disabled">
                
                        <label for="change-old-password">Change password:</label>
                        <input type="password" name="old-password" id="change-old-password" placeholder="old password" required>
                        <input type="password" name="new-password" id="change-new-password" placeholder="new password" disabled="disabled">
                
                        <button class="pref-button" type="submit" formmethod="POST" form="change-credentials" id="submit-changes-button">Submit changes</button>
                    </form>
                </div>
            </section>

            <section class="recipe-section">
                <div class="content">
                    <form id="food-restrictions-form">
                        <strong><p>Select your food restrictions:</p></strong>
            
                        <input type="checkbox" id="none-restriction-checkbox" name="food_restrictions[]" value="none">
                        <label for="none-restriction-checkbox">none</label>                 
        
                        <input type="checkbox" id="peanut-restriction-checkbox" name="food_restrictions[]" value="peanut">
                        <label for="peanut-restriction-checkbox">peanut</label> 
                        
                        <input type="checkbox" id="milk-restriction-checkbox" name="food_restrictions[]" value="milk">
                        <label for="milk-restriction-checkbox">milk</label> 
        
                        <input type="checkbox" id="eggs-restriction-checkbox" name="food_restrictions[]" value="eggs">
                        <label for="eggs-restriction-checkbox">eggs</label> 
        
                        <input type="checkbox" id="wheat-restriction-checkbox" name="food_restrictions[]" value="wheat">
                        <label for="wheat-restriction-checkbox">wheat</label> 
        
                        <input type="checkbox" id="soy-restriction-checkbox" name="food_restrictions[]" value="soy">
                        <label for="soy-restriction-checkbox">soy</label>
                        
                        <input type="checkbox" id="fish-restriction-checkbox" name="food_restrictions[]" value="fish">
                        <label for="fish-restriction-checkbox">fish</label> 
                    
                        <input type="checkbox" id="shellfish-restriction-checkbox" name="food_restrictions[]" value="shellfish">
                        <label for="shellfish-restriction-checkbox">shellfish</label> 
        
                        <input type="checkbox" id="fast-restriction-checkbox" name="food_restrictions[]" value="fast">
                        <label for="fast-restriction-checkbox">fast</label> 
        
                        <button class="pref-button" id="update-pref-button" type="submit" formmethod="POST" form="food-restrictions-form">Update</button>
                    </form>
                </div>
            </section>

            <section class="recipe-section">
                <div class="content">
                    <form id="food-lifestyle-form">
                        
                        <strong><p>Select your food life style:</p></strong>
                        
                        <input type="checkbox" id="none-lifestyle-checkbox" name="life_style[]" value="none">
                        <label for="none-lifestyle-checkbox">none</label>  
        
                        <input type="checkbox" id="veganism-lifestyle-checkbox" name="life_style[]" value="veganism">
                        <label for="veganism-lifestyle-checkbox">veganism</label>
        
                        <input type="checkbox" id="paleolithic-lifestyle-checkbox" name="life_style[]" value="paleolithic">
                        <label for="paleolithic-lifestyle-checkbox">paleolithic</label>
        
                        <input type="checkbox" id="vegetarianism-lifestyle-checkbox" name="life_style[]" value="vegetarianism">
                        <label for="vegetarianism-lifestyle-checkbox">vegetarianism</label>
                        
                        <input type="checkbox" id="slowfood-lifestyle-checkbox" name="life_style[]" value="slowfood">
                        <label for="slowfood-lifestyle-checkbox">slow food movement</label>
        
                        <button class="pref-button" id="update-lifestyle-button" type="submit" formmethod="POST" form="food-lifestyle-form">Update</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection