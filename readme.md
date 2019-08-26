# the art of Unit Testing in PHP 
[![Build Status](https://jenkins.rdok.dev/buildStatus/icon?job=the-art-of-unit-testing%2Fthe-art-of-unit-testing-in-php)](https://jenkins.rdok.dev/job/the-art-of-unit-testing/job/the-art-of-unit-testing-in-php/)
 
 > Here's the scenario. Your company has many internal products it uses to monitor its applications at customer sites. All these products write log files and place them in a special directory. The log files are written in a proprietary format that your company has come up with that can't be parsed by any existing third-party tools. You're tasked with building a product, LogAn, that can analyze these log files and find special cases and events in them. When it finds these cases and events, it should alert the appropriate parties.

Major features: LogAn's parsing, event-recognition, and notification abilities. 

Each chapter is covered in it's own unit folder. 

At the end we'll have an additional folder showcasing the complete project.

#### Disclaimer
I'm not following 100% the author's recommendations in cases where my experience has shown a more appropriate way. For example, it has been my experience that naming unit tests in a human sentence description is easier for the future me & other developers to understand the intent of the unit test versus the authors template `[UnitOfWorkName]_[ScenarioUnderTest]_[ExpectedBehavior]`. That is, whereas the author recommends `sum_byDefault_returnsZero`, I use `it_sums_to_zero_by_default`. In addition to being more readable, my approach also solves the problem of having to change the unit test when refactoring the function name under test.

