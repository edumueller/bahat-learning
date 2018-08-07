Feature: Membership

  In order to give registered members access to exclusive content
  As an administrator
  I need authentication and registration for users

  Scenario: Login
    Given I am on "http://homol.logcomex.io/#/signin"
    When I fill in the following:
    | Email | Senha |
    | "eduardo@logcomex.com" | "underground" |
    And I press "Entrar"
    Then I should be on "http://homol.logcomex.io/#/inteligencia/importacao"
#    Given I have the following users
#    | name | email | password |
#    | JohnDoe | john@example.com | secret |
#    | JaneDoe | jane@example.com | secret |