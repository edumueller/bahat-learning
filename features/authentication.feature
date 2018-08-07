Feature: Membership

  In order to give registered members access to exclusive content
  As an administrator
  I need authentication and registration for users

  Scenario: Registration
    When I register "JohnDoe" "john@example.com" "secret"
    Then I should have an account

  Scenario: Successful Authentication
    Given I have an account "JohnDoe" "john@example.com" "secret"
    When I sign in
    Then I should be logged in

  Scenario: Failed Authentication
    When I sign in with invalid credentials
    Then I should not be logged in


#    Given I have the following users
#    | name | email | password |
#    | JohnDoe | john@example.com | secret |
#    | JaneDoe | jane@example.com | secret |