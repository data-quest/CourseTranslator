Feature: Set english course name
In order to translate a course name, as translator, I have to type a name for selected course

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

Scenario: Set new english coursename
    Given I have translator role
    When I input the name "English Test" for course "1"
    Then I should changed the coursename
    And english coursename schould be "English Test"
    
Scenario: Set empty english coursename
    Given I have translator role
    And suggestor suggest "Test" as english name
    When I input the name "" for course "3"
    Then I should changed the coursename
    And english coursename schould be "Test"

Scenario: replace english coursename
    Given I have translator role
    When I input the name "English Test" for course "3"
    Then I should changed the coursename
    And english coursename schould be "English Test"
