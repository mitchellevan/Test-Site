# User and Programmatic Interaction Flow

This document describes the intended user and programmatic interaction flow for the Open A11y Test Site

## Registration
* Upon first page view, the system checks for the existence of our cookie, indicating that the user has been here before. (it checks cookie value *and* looks for a corresponding record in the users table)
* If no match is found we redirect the user to a registration page at which they enter the following information:
  * browserBrand
  * browserVersion
  * operatingSystem
  * osVersion
  * uaString
  * atType
  * atBrand
  * atVersion
* Upon successful submission of the form, we enter a new record in the users table and set a cookie with their userKey value.

## Testing
Upon successful submission of the registration form (or on subsequent visits where we see a valid cookie) users can then begin testing.

* User accesses the test page and are presented with a test file (retrieved at random).  They can skip (and be presented with another file at random) or stay
* Each test file is intended to present a single concept and has an accompanying description of what is being tested. The user interacts with the test file.
* The user then fills in a form to indicate whether or not the test was a pass or fail and, optionally, what happened instead.
* User submits the form and, upon successful submission, will be presented with another random test file.


