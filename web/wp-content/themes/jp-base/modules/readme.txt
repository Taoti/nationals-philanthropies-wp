# What are modules?
Modules are meant to be resuable components that you can use in different places around your theme templates. This is to maintain a DRY codebase. Look up "DRY coding principle" if you are unfamiliar with DRY (Don't Repeat Yourself).

It's also beneficial, though not a requirement, if modules can be easily used on multiple projects. Modules should be easy to copy/paste to other projects (aside from some basic CSS tweaks like color variable names).

Basically, the component you are creating should be a module if:
	1. that component is used on multiple template files,
	2. that component needs to take some number of arguments and process them in some way,
	3. OR that component can be easily copied to a different project with some functional JS and SCSS that goes with it.

# Module or Part?
If you need a repeatable component but maybe it's not so complex to need arguments, or it doesn't need to be used on other projects, you can use a part file instead. See `parts/readme.txt`.

# What makes a module a module?
Each module is a class that will accept an array of arguments. These arguments can be parsed/processed in some way, then passed to a twig template.

For example, a post ID can be passed as an argument to a class that retrieves a post title and featured image, then passes the title and image to twig.

Javascript - Each module has its own JS folder. Any .js files here will be compiled into the main scripts.min.js file by gulp.

SCSS - Each module has its own SCSS folder, but .scss files here must be `@include`d in a noncritical or critical file in the theme's main styles folder.

Twig - Each module has its own views folder. Any twig templates here will be accessible to be rendered from your class file.

See the `example` module as a starting point, and for a CLI automated way to generate new modules (bash command).
