Sofa
===

Hi. I'm a starter theme called `Sofa`, if you like, based on another starter theme called `underscores`. 

Crazy, I know...

Like `underscores`, I'm designed to be hacked. I'm not a Parent Theme. 

If you're used to `underscores`, you may be wondering what's different about me: 

* I prefer using classes to organize like-minded code and avoid namespace collisions. 
* My `functions.php` file is even more bare-bones than that of `underscores`. 
* I use a core theme class in `inc/class-sofa-theme.php` that sets up all my important core theme and WordPress hooks.
* A handy upgrade class to manage theme upgrades in `inc/class-sofa-upgrade.php`.
* I store my custom template tags in `inc/functions/template-tags.php`.
* A helper class for the Customizer in `inc/admin/class-sofa-customizer.php`.
* A helper class for Jetpack in `inc/jetpack/class-sofa-jetpack.php`. 
* I'm meant to be used with SASS. Accordingly, I've dropped the `layouts` folder you have in `underscores`. You'll find SASS versions of those CSS files in `sass/layouts`. 

Here's what I have in common with `underscores`:

* A just right amount of lean, well-commented, modern, HTML5 templates.
* A helpful 404 template.
* A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry.
* Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
* Licensed under GPLv2 or later. :) Use it to make something cool.

Getting Started
---------------

If you want to set things up manually, download `sofa` from GitHub. The first thing you want to do is copy the `sofa` directory and change the name to something else (like, say, `megatherium`), and then you'll need to do a five-step find and replace on the name in all the templates.

1. Search for `'sofa'` (inside single quotations) to capture the text domain.
2. Search for `sofa_` to capture all the function names.
3. Search for `Text Domain: sofa` in style.css.
4. Search for <code>&nbsp;sofa</code> (with a space before it) to capture DocBlocks.
5. Search for `sofa-` to capture prefixed handles.

OR

* Search for: `'sofa'` and replace with: `'megatherium'`
* Search for: `sofa_` and replace with: `megatherium_`
* Search for: `Text Domain: sofa` and replace with: `Text Domain: megatherium` in style.css.
* Search for: <code>&nbsp;sofa</code> and replace with: <code>&nbsp;Megatherium</code>
* Search for: `sofa-` and replace with: `megatherium-`
* Search for file names that begin with `class-sofa` to and rename them to `class-megatherium`.

Then, update the stylesheet header in `style.css` and the links in `footer.php` with your own information. Next, update or delete this readme.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
