# Contributing

## About this Project
**Important** This project is solely for managing the testing site: IOW the site which allows visitors to come and test the files.  This project is not for contributing to the tests themselves. The tests themselves are managed through [https://github.com/Open-A11y-Testing/Test-Triage](https://github.com/Open-A11y-Testing/Test-Triage). Please go there if you're interested in submitting potential new tests.

## Platform
* The Open A11y Test Site is built on a basic LAMP Platform. 
* The backend is run on PHP and MySQL running on Apache on CentOS.  
* The front-end is HTML5 and CSS3.
* SASS is used to compile the CSS
* jQuery is used for JavaScript

If you're proficient in any of these, we encourage you to contribute!


## General Guidelines
**Note February 22, 2014: This information is subject to numerous and drastic changes in the near future. For now, email karl@karlgroves.com to discuss ways to contribute**

* Fork the repo and work against your fork. 
* New submissions must have a related [issue](https://github.com/Open-A11y-Testing/Test-Site/issues). Describe specifically what is needed and why.
* Issue your pull request against that specific issue. 

## Contributing to Front-End work
Given the nature of this system, we want the front-end to support the widest range of user agents and assistive technologies as possible. Do not use the latest and greatest bleeding edge feature unless it degrades gracefully. Try to avoid workarounds and polyfills.

### Accessibility
* Naturally, given the nature of this system, all work must be accessible and must conform, without exception, to WCAG 2.0 Level AAA

### Design
* We use SASS (without Compass) for CSS. Always look for an existing declaration or mixin before adding new ones.

### JavaScript
* For the most part, JavaScript use should be extremely limited in this system and reserved for cases where it is needed for performance, cross-platform compatibility, or critical features.
* Presentation or modification of UI components with JavaScript is especially discouraged in this system.
* This system uses jQuery 1.10. Feel free to use vanilla JS as well. No other JS frameworks will be used.
* All non-trivial features must be accompanied by working unit tests.

## Contributing to Back-End work
Backend work is driven by PHP & MySQL using the [gs_libs](https://bitbucket.org/karlgroves/gs_libs) PHP library from Karl Groves. The database class in that library is based on PDO.  Documentation for gs_libs is available in HTML, latex, rtf, and even man pages.

## Bugs and Improvements
* Find a bug? Create an [issue](https://github.com/Open-A11y-Testing/Test-Site/issues).
* If you can fix it, please do so.
