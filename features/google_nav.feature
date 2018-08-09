Feature: Navigate Google
  User can navigate to google website
  As any user
  So I can see if this thing will start working

  @javascript
  Scenario: Open Google
    When I go to "http://homol.logcomex.io"
    Then I should be able to see "Faça login em sua conta"


#  Scenario: Successful Authentication
#    Given I have an account "JohnDoe" "john@example.com" "secret"
#    When I sign in
#    Then I should be logged in
#
#  Scenario: Failed Authentication
#    When I sign in with invalid credentials
#    Then I should not be logged in


#    Given I have the following users
#    | name | email | password |
#    | JohnDoe | john@example.com | secret |
#    | JaneDoe | jane@example.com | secret |