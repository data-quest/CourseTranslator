@listCourses
Feature: list courses
In order to translate coursenames, as translator, I have to view all courses

Background:
    Given following semster:  
      | name         | start      | end        |
      | SoSe 2014    | 1396303200 | 1412114399 |
      | WiSe 2012/13 | 1349042400 | 1364767199 |
       | SoSe 2012    | 1333231200 | 1349042399 |
      | WS 2006/07   | 1159653600 | 1175378399 |
      | WS 2005/06   | 1128117600 | 1143842399 |
    And following institutions:
       | instituteName                                               |
     | AfK - Berufsfeldorientierte Kompetenzen                     |
    | Institut fuer Anglistik                                      |
       | Institut fuer Germanistik                                    |
     | Institut fuer Pflanzenphysiologie                            |
      | Institut fuer Ernaehrungswissenschaft                         |
   | Institut fuer Phytopathologie und Angewandte Zoologie        |
    | Institut fuer Mikrobiologie und Molekularbiologie            |
     | Institut fuer Pflanzenbau und Pflanzenzuechtung I             |
      | Institut fuer Parasitologie                                  |
     | Materialwissenschaften (Advanced Materials)                 |
    | Anwendungsfelder der Sportwissenschaft                      |
     | Weiterbildung                                               |
       | Institut fuer Biochemie                                      |
  | Institut fuer Evangelische Theologie                         |
    | Strafrecht und Strafprozessrecht                             |
    | Sprachheilpaedagogik                                         |
     | Zentrum fuer Philosophie und Grundlagen der Wissenschaft (ZfPh) |
    And following courses:    
        | germanName                                                                                                              | englishName | courseStart | courseDuration | semesterName                       | instituteName                      |
       | Erwachsenenbildung im Spannungsfeld von Lehren und Lernen - Theoretische Ansaetze und praktische Handlungskonzepte       |             | 1349042400  | 0              | WiSe 2012/13 | Weiterbildung |
       | Einfuehrung in das Studiengebiet Literatur                                                                               |             | 1349042400  | 0              | WiSe 2012/13 | Institut fuer Germanistik |
       | Schwimmen B                                                                                                             |   Swimming B  | 1349042400  | 0              | WiSe 2012/13 | Anwendungsfelder der Sportwissenschaft |
       | Ausgewaehlte parasitaere Zoonosen                                                                                         |             | 1349042400  | 0              | WiSe 2012/13 | Institut fuer Parasitologie |
       | Seminar fuer Projektpraktikanten, Diplomanden und Doktoranden                                                            |             | 1349042400  | 0              | WiSe 2012/13 | Institut fuer Biochemie  |
       | Systematik auf der Insel. Einfuehrung in Religionsphilosophie und Ethik: Spinozas Ethik.                                 |             | 1349042400  | 0              | WiSe 2012/13 | Institut fuer Evangelische Theologie |
       | Kants Rechts- und Staatsphilosophie                                                                                     |             | 1349042400  | 0              | WiSe 2012/13 | Zentrum fuer Philosophie und Grundlagen der Wissenschaft (ZfPh) |
       | Einfuehrung in die Theoretische Philosophie I                                                                            | Introduction to Theoretical Philosophy I            | 1349042400  | 0              | WiSe 2012/13 | Zentrum fuer Philosophie und Grundlagen der Wissenschaft (ZfPh) |
       | Seminar zum Wirtschaftsstrafrecht, 2st.                                                                                 |             | 1349042400  | 0              | WiSe 2012/13 | Strafrecht und Strafprozessrecht |
       | Sprachheilpaedagogisches Handeln: Diagnostik und Intervention*                                                           |             | 1349042400  | 0              | WiSe 2012/13 | Sprachheilpaedagogik |
       | Fachschaft Materialwissenschaften                                                                                       |             | 1191189600  | -1             | SoSe 2014 | Materialwissenschaften (Advanced Materials) |
       | Mitarbeiterseminar: Aktuelle Forschungsarbeiten der Zell- und Molekularbiologie                                         |             | 1301608800  | -1             | SoSe 2014 | Institut fuer Mikrobiologie und Molekularbiologie  |
       | Seminar fuer Pflanzenzuechtung                                                                                            |             | 1317420000  | -1             | SoSe 2014 | Institut fuer Pflanzenbau und Pflanzenzuechtung I |
       | Aktuelle Themen der Pflanzengenetik und Pflanzenzuechtung                                                                |             | 1317420000  | -1             | SoSe 2014 | Institut fuer Pflanzenbau und Pflanzenzuechtung I |
       | Progress Seminar Forschergruppe FOR 666                                                                                 |             | 1175378400  | -1             | SoSe 2014 | Institut fuer Phytopathologie und Angewandte Zoologie |
       | Team-Arbeit im Masterstudium Pflanzenphysiologie                                                                        |             | 1285884000  | -1             | SoSe 2014 | Institut fuer Pflanzenphysiologie  |
       | Fundamental aspects of Plant Biotechnologie and its translational Potential                                             |             | 1317420000  | -1             | SoSe 2014 | Institut fuer Phytopathologie und Angewandte Zoologie |
       | Current advances in plant physiology and plant molecular biology / Seminar zur aktuellen Fragen der Pflanzenphysiologie |             | 1285884000  | -1             | SoSe 2014 | Institut fuer Pflanzenphysiologie  |
       | Methodenentwicklung in der Planarchromatographie                                                                        |             | 1317420000  | -1             | SoSe 2014 | Institut fuer Ernaehrungswissenschaft  |
       | Teamseminar fuer Studenten/innen und Mitarbeiter/innen                                                                   |             | 1317420000  | -1             | SoSe 2014 | Institut fuer Pflanzenphysiologie  |
       | Kulturmanagement praktisch - das A-Z einer Kunstausstellung                                                             |             | 1317420000  | 15811200       | SoSe 2012 | AfK - Berufsfeldorientierte Kompetenzen |
       | Seminar E-Learning DaF / EFL SS06                                                                                       |             | 1143842400  | 15811200       | WS 2006/07 |  Institut fuer Anglistik |
       | Digitale Medien im DaF-Unterricht                                                                                       |             | 1096581600  | 31536000       | WS 2005/06 | Institut fuer Germanistik |

Scenario: List all courses
    Given I have translator role
    When I view courses
    Then I should see courses

Scenario: List courses by selected semester
    Given I have translator role
    And I selected semester "SoSe 2012"
    When I view courses
    Then I should see following courses:
    | germanName                                                  | englishName |
      | Kulturmanagement praktisch - das A-Z einer Kunstausstellung |             |

Scenario: List courses by selected institute
    Given I have translator role
    And I selected institute "Sprachheilpaedagogik"
    When I view courses
    Then I should see following courses:
     | germanName                                                  | englishName |
       | Sprachheilpaedagogisches Handeln: Diagnostik und Intervention*|            |                                                           

Scenario: List courses by name
    Given I have translator role
    And I search for coursename "Einfuehrung"
    When I view courses
    Then I should see following courses:
 | germanName                                                  | englishName |
       | Einfuehrung in das Studiengebiet Literatur  |    |
       | Systematik auf der Insel. Einfuehrung in Religionsphilosophie und Ethik: Spinozas Ethik.   |  |      
       | Einfuehrung in die Theoretische Philosophie I    | Introduction to Theoretical Philosophy I |

Scenario: List not translated courses
    Given I have translator role
    And I hide translated courses
    When I view courses
    Then I should see following courses:
      | germanName                                                  | englishName |
      | Erwachsenenbildung im Spannungsfeld von Lehren und Lernen - Theoretische Ansaetze und praktische Handlungskonzepte       |             | 
       | Einfuehrung in das Studiengebiet Literatur                                                                               |             |
       | Ausgewaehlte parasitaere Zoonosen                                                                                         |             | 
       | Seminar fuer Projektpraktikanten, Diplomanden und Doktoranden                                                            |             | 
       | Systematik auf der Insel. Einfuehrung in Religionsphilosophie und Ethik: Spinozas Ethik.                                 |             |
       | Kants Rechts- und Staatsphilosophie                                                                                     |             | 
       | Seminar zum Wirtschaftsstrafrecht, 2st.                                                                                 |             | 
       | Sprachheilpaedagogisches Handeln: Diagnostik und Intervention*                                                           |             |
       | Fachschaft Materialwissenschaften                                                                                       |             | 
       | Mitarbeiterseminar: Aktuelle Forschungsarbeiten der Zell- und Molekularbiologie                                         |             |
       | Seminar fuer Pflanzenzuechtung                                                                                            |             |
       | Aktuelle Themen der Pflanzengenetik und Pflanzenzuechtung                                                                |             | 
       | Progress Seminar Forschergruppe FOR 666                                                                                 |             | 
      | Team-Arbeit im Masterstudium Pflanzenphysiologie                                                                        |             | 
       | Fundamental aspects of Plant Biotechnologie and its translational Potential                                             |             | 
       | Current advances in plant physiology and plant molecular biology / Seminar zur aktuellen Fragen der Pflanzenphysiologie |             | 
       | Methodenentwicklung in der Planarchromatographie                                                                        |             |
       | Teamseminar fuer Studenten/innen und Mitarbeiter/innen                                                                   |             | 
       | Kulturmanagement praktisch - das A-Z einer Kunstausstellung                                                             |             |
       | Seminar E-Learning DaF / EFL SS06                                                                                       |             |
       | Digitale Medien im DaF-Unterricht                                                                                       |             | 


Scenario: List courses by name and selected institute
    Given I have translator role
    And I search for coursename "Einfuehrung"
    And I selected institute "Institut fuer Germanistik"
    When I view courses
    Then I should see following courses:
                                | germanName                                                  | englishName |
       | Einfuehrung in das Studiengebiet Literatur  |    |

Scenario: List courses by name and selected semester
    Given I have translator role
    And I search for coursename "Einfuehrung"
    And I selected semester "WiSe 2012/13"
    When I view courses
    Then I should see following courses:
     | germanName                                                  | englishName |
       | Einfuehrung in das Studiengebiet Literatur  |    |
      | Systematik auf der Insel. Einfuehrung in Religionsphilosophie und Ethik: Spinozas Ethik.   |  |      
       | Einfuehrung in die Theoretische Philosophie I    | Introduction to Theoretical Philosophy I |

Scenario: List courses by name and not translated
    Given I have translator role
    And I search for coursename "Einfuehrung"
    And I hide translated courses
    When I view courses
    Then I should see following courses:
 | germanName                                                  | englishName |
       | Einfuehrung in das Studiengebiet Literatur  |    |
       | Systematik auf der Insel. Einfuehrung in Religionsphilosophie und Ethik: Spinozas Ethik.   |  |      


Scenario: List courses by institute and semester
    Given I have translator role
    And I selected institute "Zentrum fuer Philosophie und Grundlagen der Wissenschaft (ZfPh)"
    And I selected semester "WiSe 2012/13"
    When I view courses
    Then I should see following courses:
      | germanName                                                  | englishName |
             | Kants Rechts- und Staatsphilosophie                    | |
       | Einfuehrung in die Theoretische Philosophie I   | Introduction to Theoretical Philosophy I |

Scenario: List courses by institute and not translated
    Given I have translator role
    And I selected institute "Zentrum fuer Philosophie und Grundlagen der Wissenschaft (ZfPh)"
    And I hide translated courses
    When I view courses
    Then I should see following courses:
     | germanName                                                  | englishName |
       | Kants Rechts- und Staatsphilosophie                    | |


Scenario: List courses by all criteria
    Given I have translator role
    And I search for coursename "Einfuehrung"
    And I selected institute "Institut fuer Germanistik"
    And I selected semester "WiSe 2012/13"
    When I view courses
    Then I should see following courses:
     | germanName                                                  | englishName |
       | Einfuehrung in das Studiengebiet Literatur  |    |
