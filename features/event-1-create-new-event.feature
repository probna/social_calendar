Feature: Create a new event
  In order to invite people to an event
  As event owner
  I need to create an event

  Scenario: There is a link to add new event on event page
    Given I am authenticated as "hcs.omot"
    And I am on "/event/"
    When I click "Create a new event"
    Then I should be on "/event/new"
    And I should see "Event creation"


  Scenario: Add new event
    Given I am authenticated as "hcs.omot"
    And I am on "/event/new"
    And there is no event with event name "behat testing fiesta"
    When I fill in "aviation_airlinesbundle_flight[flightNumber]" with "123"
    And I fill in "aviation_airlinesbundle_flight[flightCode]" with "B234"
    And I select "2015" from "aviation_airlinesbundle_flight[arrivalTime][date][year]"
    And I select "Lufthansa" from "aviation_airlinesbundle_flight[airline]"
    And I select "Pleso" from "aviation_airlinesbundle_flight[departureAirport]"
    And I select "Split" from "aviation_airlinesbundle_flight[arrivalAirport]"
    And I press "Create"
    Then the url should match "[flight\/\d+]"

