## Principles

Test files are granular and independent of this test harness, so they could be used in other test harnesses elsewhere.

Should work in "any browser" (details TBD)

Write the test code as simple as possible.

Write testable assertions that are as specific as possible.

Provide step-by-step instructions that are consumable and repeatable by a novice tester.

Write expected results consistent with the spec.

* Example of a non-specific assertion: Anchor supports aria-label.
* Example of a specific assertion: aria-label value is revealed, and the anchor text content is not.

Use plain language. Check grammar and spelling.

## Definition of terms

simple vs. composite -- there is not a bright line between them, but "simple" is generally a single element and attribute, while "composite" is a piece of code that combines several simple elements.

## personas (who works with the system)

* test writer
* test reviewer
* tester
* ? test result reviewer

## test design

elements of a test

* instructions for what the tester should do
* expected result
** consumable by "tester" persona
* fragment of HTML (see below)

metadata about a test:

* spec is ambiguous
* MUST/MUST NOT or SHOULD/MAY
* \+origin of test

## simple tests

* host language: HTML4, HTML5, SVG
* single implicit role, or single explicit role
* state and/or property

## composite tests

* combinations of implicit and explicit roles

## what do we gather

* OS version and browser version (automatic)

## instructions and expected

Example: Anchor with aria-label

* Anchor with aria-label, where the label does not match the text node inside of it.
* metadata:
** spec is clear; enumeration of valid host languages (html4 html5 svg)
** element: link
** aria attribute(s): aria-label
** date published: (see discussion below)
** Specific assertion: aria-label value is revealed, and the anchor value is not.
* Visible instructions: (1) Locate the link. (2) Read the link text.
* Expected results: The link text should be "xxxxx".

Example: role=checkbox on a span  
* metadata  
* Instructions: (1) Locate the "Apples" checkbox. (2) Click "Apples".  
* Expected results: The checkbox should now be checked.

Example: role="banner" on a div

## what the tester should fill in, in a questionnaire for each test

* pass, fail, not clear
* comments

## SCOPE of iteration 1 of this document (Saturday 2014.03.22)

Proposed: what does a person need in order to write a test, where the spec is clear

## Assumptions

Do we write AT-specific instructions? Current assumption is no.

Hand write each test. (Generated tests are an optimization.)

## Somebody else's scope

* Instructions for testing in general, e.g. home page that leads a tester into the tests.
* capture (outside of individual test):
** AT and version

important open questions:

* Is the metadata we're reporting the right set of data?
* How do you get into the test page, and get back out of it, and report your results?

What are our simple tests? This is not a question for the test format; Jeremy and Dylan are working on this.

* Example: 14 region roles
* Which tests can be automatically generated?

## BACKLOG - post iteration 1, and open questions

Can there be multiple tests per page?

Privacy statement.

Instruction to test writer: Don't be evil. E.g. Don't allow script injection.

Request: We want a human-readable date, so the person seeing it has an idea of how old this is. We also will need a way to tell which version of a test the person tested; this is a data capture question.

I18n (internationalization) of:

* instructions
* natural language content of the test

Do we show the assertion to the tester? It might be confusing for a novice tester.

Minimum browser, and effect on Karl's jQuery assumption

As elements of this proposal are settled, we'll update contributing.md. 
