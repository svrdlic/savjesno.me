# Traffic Violation Reporting System - Savjesno.me

[![Software License](https://img.shields.io/badge/license-BSD3-brightgreen.svg?style=flat-square)](LICENSE)

Traffic Violation Reporting System (TVRS in further text) is developed using Laravel 5.3 PHP framework.

If you are not familiar with Laravel, visit official [documentation](https://laravel.com/docs/5.3) and you'll be able to grasp it in matter of minutes.

Main idea of TVRS is to decrease the number of traffic violations by enabling citizens to report these acts.

You can see live application here [Savjesno.me](https://savjesno.me) and we will try to push new commits to live system on daily basis.

## Roadmap

This project is in early stage right now, and there will be many changes to come, including ones without backward compatibility.

These are the following steps:

 * User profile page
 * On registration choose username
 * For social users if there is no e-mail ask them to enter one
 * User roles support
 * Administration panel
 * Account type for police representatives, where they will be able to update incidents
 * Better layout of violation widgets and page, which will include license plates, fines paid etc.
 * API for mobile apps
 * Embed incident option, Twitter-like
 * SEO improvements, sitemap generator at least and meta tags
 * OG images automatic generator based on incident title
 * License plate generator for better representation, based on design of real plates
 * Statistics of incidents reported in graphic way, charts, tables, graphics
 * Fine amount counter on home page
 * Infinite loading of incidents
 * Search feature based on Algolia
 * Simple blog
 * Update incident feature, for general public, like on Medium posts
 * Incident caching using Redis
 
If you have any other ideas please open new issue and tag it as feature or improvement.
 
## Contributing

Thank you for considering contributing to TVRS we appreciate that, and we hope we'll develop all the features faster and in better quality with your contributions.

Main rule for pushing new code to this repo is to always use the latest code from master branch. So before you try to push your commits first pull the latest code from master branch, and only then if everything is OK push your code. By doing this we'll reduce the number of awful merge conflicts.

## Security Vulnerabilities

If you discover a security vulnerability within TVRS do not open new issue here, just send an e-mail to main contributor Ivan Radunovic at ivan@codingo.me.  All security vulnerabilities will be promptly addressed.

## License

TVRS is licensed under [BSD-3 license](https://opensource.org/licenses/BSD-3-Clause).
