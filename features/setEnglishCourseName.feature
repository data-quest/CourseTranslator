Feature: Set english course name
In order to translate a course name, as translator, I have to type a name for selected course

Background:
  Given following semster:  
      | id                               | name         | start      | end        |
      | e43e53ff72d2cfb958a3ab80e018c469 | SoSe 2014    | 1396303200 | 1412114399 |
      | 57d61193363511220f90052491299fea | WiSe 2012/13 | 1349042400 | 1364767199 |
      | cff12f76764199233f9a9a23780eaeb1 | SoSe 2012    | 1333231200 | 1349042399 |
      | 953e51bad5c1ecdfda991066bb9286ab | WS 2006/07   | 1159653600 | 1175378399 |
      | 7558859e74507b0bf0a1af83b4fe4d22 | WS 2005/06   | 1128117600 | 1143842399 |
    And following institutions:
      | instituteId                      | instituteName                                               |
      | dbd5f0faebd4d8699627209d2f625be5 | AfK - Berufsfeldorientierte Kompetenzen                     |
      | d20cea6b895eb7f5595d3dc1ad65204e | Institut fuer Anglistik                                      |
      | b4398caa75793474e2d6b00dc4b4a608 | Institut fuer Germanistik                                    |
      | 503a2573eaa8bbfe6196e230a006f7d6 | Tieroekologie und Spezielle Zoologie                         |
      | a6b5abd24d573cd7bb37ac587f1202fc | Institut fuer Pflanzenphysiologie                            |
      | 66007528854a3da1d7c9066563ced73a | Institut fuer Ernaehrungswissenschaft                         |
      | 5b3057bb56b1b6c569a74a8c1704ad56 | Institut fuer Phytopathologie und Angewandte Zoologie        |
      | 9bcb1b1010cb2ac1befc78c63de0c0fb | Institut fuer Mikrobiologie und Molekularbiologie            |
      | 8a1665a38e06325c6a78470b68cec7f7 | Institut fuer Pflanzenbau und Pflanzenzuechtung I             |
      | cfb9b91ec8a5c6f1140283e505c5fd53 | Institut fuer Parasitologie                                  |
      | 78cd9ff195605d379c7bd28ca0b07e6e | Materialwissenschaften (Advanced Materials)                 |
      | 8e9d4357c6372eea75f4ced95ec2f2c6 | Abteilung fuer Paedagogische Psychologie                      |
      | 8efdad9d68984f85ff875282881471e2 | Professur fuer Alte Geschichte                               |
      | 92b89ae00ae39d467c3cd5a1a9a53445 | Professur fuer Mittelalterliche Geschichte                   |
      | bcf376e7d046ac42d47168e789352f23 | Anwendungsfelder der Sportwissenschaft                      |
      | 7cb9fe09c7db5aa265031164c2195d77 | Arbeitsbereich Sportpsychologie und Bewegungswissenschaften |
      | 71bd1fb8ac481d07c8340c752160e177 | Transformations- und Integrationsoekonomik (VWL IV)          |
      | 14d2ebbcc15841107445a024517dde7f | AfK - Schreibkurse                                          |
      | 4413b292802bc54d96bb82ae5dfaf8b3 | Arbeitsbereich Sportdidaktik                                |
      | 69797971fdb58753f91a858b8f497fd0 | Fachbereich 02: Wirtschaftswissenschaften                   |
      | 651812b5a634db541867454778c28050 | AfK - Study-Skills                                          |
      | 8bec043f62859a2cc85f5d1bb2c48525 | Kanzlerbuero                                                 |
      | f25a6d205d69ec7f900b2b127fe3180a | Weiterbildung                                               |
      | 7923d171be020d539ec35a9b96a56343 | Institut fuer Biochemie                                      |
      | 9ce9268f934e3c868fe89d8eb0fd60c9 | Institut fuer Evangelische Theologie                         |
      | 48fd774157726b65ac8eb2caeebb97e5 | Strafrecht und Strafprozeßrecht                             |
      | 87fc6334c6c3d93129dceb393934a67b | Sprachheilpaedagogik                                         |
      | ddf0ae559a8dddc63836c9804da1b248 | Zentrum fuer Philosophie und Grundlagen der Wissenschaft (ZfPh) |
    And following courses:    
      | id                               | germanName                                                                                                              | englishName | courseStart | courseDuration | semesterId                       | instituteId                      |
      | d1fc91b7c01491d08111095c8a6deb2a | Erwachsenenbildung im Spannungsfeld von Lehren und Lernen - Theoretische Ansaetze und praktische Handlungskonzepte       |             | 1349042400  | 0              | 57d61193363511220f90052491299fea | f25a6d205d69ec7f900b2b127fe3180a |
      | 45fefc0a8847ded1d9fe0ff05765d3d1 | Einfuehrung in das Studiengebiet Literatur                                                                               |             | 1349042400  | 0              | 57d61193363511220f90052491299fea | b4398caa75793474e2d6b00dc4b4a608 |
      | 96d42d57882c5015e42e48e277acc280 | Schwimmen B                                                                                                             |             | 1349042400  | 0              | 57d61193363511220f90052491299fea | bcf376e7d046ac42d47168e789352f23 |
      | 9a57b1107b13e4337fcff47723974cd1 | Ausgewaehlte parasitaere Zoonosen                                                                                         |             | 1349042400  | 0              | 57d61193363511220f90052491299fea | cfb9b91ec8a5c6f1140283e505c5fd53 |
      | 97ba4bfbfe105b5ca39724ffc78427fc | Seminar fuer Projektpraktikanten, Diplomanden und Doktoranden                                                            |             | 1349042400  | 0              | 57d61193363511220f90052491299fea | 7923d171be020d539ec35a9b96a56343 |
      | 182518973de842aa39365b71daaa6ca3 | Systematik auf der Insel. Einfuehrung in Religionsphilosophie und Ethik: Spinozas Ethik.                                 |             | 1349042400  | 0              | 57d61193363511220f90052491299fea | 9ce9268f934e3c868fe89d8eb0fd60c9 |
      | 070cd9d5a55bb4edc6e0ee5f8956a074 | Kants Rechts- und Staatsphilosophie                                                                                     |             | 1349042400  | 0              | 57d61193363511220f90052491299fea | ddf0ae559a8dddc63836c9804da1b248 |
      | 08a05a4c708f876a9382c5b4cef6b972 | Einfuehrung in die Theoretische Philosophie I                                                                            |             | 1349042400  | 0              | 57d61193363511220f90052491299fea | ddf0ae559a8dddc63836c9804da1b248 |
      | 265249181e76dd82eb17427180e74b4b | Seminar zum Wirtschaftsstrafrecht, 2st.                                                                                 |             | 1349042400  | 0              | 57d61193363511220f90052491299fea | 48fd774157726b65ac8eb2caeebb97e5 |
      | 429b340b7e9e208588cbf1f1ece8300e | Sprachheilpaedagogisches Handeln: Diagnostik und Intervention*                                                           |             | 1349042400  | 0              | 57d61193363511220f90052491299fea | 87fc6334c6c3d93129dceb393934a67b |
      | b5d34052952aef9bd7068a92fa0766e2 | Fachschaft Materialwissenschaften                                                                                       |             | 1191189600  | -1             | e43e53ff72d2cfb958a3ab80e018c469 | 78cd9ff195605d379c7bd28ca0b07e6e |
      | 6b743f0ae7094fa9a365b22bea10db66 | Mitarbeiterseminar: Aktuelle Forschungsarbeiten der Zell- und Molekularbiologie                                         |             | 1301608800  | -1             | e43e53ff72d2cfb958a3ab80e018c469 | 9bcb1b1010cb2ac1befc78c63de0c0fb |
      | 698d818c9a9e9480eb75cabba0b81c09 | Seminar fuer Pflanzenzuechtung                                                                                            |             | 1317420000  | -1             | e43e53ff72d2cfb958a3ab80e018c469 | 8a1665a38e06325c6a78470b68cec7f7 |
      | 2e437da3948ba35772f49c677a3b5553 | Aktuelle Themen der Pflanzengenetik und Pflanzenzuechtung                                                                |             | 1317420000  | -1             | e43e53ff72d2cfb958a3ab80e018c469 | 8a1665a38e06325c6a78470b68cec7f7 |
      | e1a80b27c88c97eb80a1445d7916e4a7 | Progress Seminar Forschergruppe FOR 666                                                                                 |             | 1175378400  | -1             | e43e53ff72d2cfb958a3ab80e018c469 | 5b3057bb56b1b6c569a74a8c1704ad56 |
      | 53d2656d9d184e25d3141d131212def5 | Team-Arbeit im Masterstudium Pflanzenphysiologie                                                                        |             | 1285884000  | -1             | e43e53ff72d2cfb958a3ab80e018c469 | a6b5abd24d573cd7bb37ac587f1202fc |
      | aca90daf3a9ec40dab9b241f3edf4ae5 | Fundamental aspects of Plant Biotechnologie and its translational Potential                                             |             | 1317420000  | -1             | e43e53ff72d2cfb958a3ab80e018c469 | 5b3057bb56b1b6c569a74a8c1704ad56 |
      | 86e0a37340163b41ef5e01e793ec68b6 | Current advances in plant physiology and plant molecular biology / Seminar zur aktuellen Fragen der Pflanzenphysiologie |             | 1285884000  | -1             | e43e53ff72d2cfb958a3ab80e018c469 | a6b5abd24d573cd7bb37ac587f1202fc |
      | ddb42ffdb69d8c03db8514d14fc57f46 | Methodenentwicklung in der Planarchromatographie                                                                        |             | 1317420000  | -1             | e43e53ff72d2cfb958a3ab80e018c469 | 66007528854a3da1d7c9066563ced73a |
      | c349279d4585de6456ec2040996f6b1c | Teamseminar fuer Studenten/innen und Mitarbeiter/innen                                                                   |             | 1317420000  | -1             | e43e53ff72d2cfb958a3ab80e018c469 | a6b5abd24d573cd7bb37ac587f1202fc |
      | 7424827e2de8ea8f87fed360c28b9507 | Kulturmanagement praktisch - das A-Z einer Kunstausstellung                                                             |             | 1317420000  | 15811200       | cff12f76764199233f9a9a23780eaeb1 | dbd5f0faebd4d8699627209d2f625be5 |
      | 711563a567180e853376986f7a03806e | Seminar E-Learning DaF / EFL SS06                                                                                       |             | 1143842400  | 15811200       | 953e51bad5c1ecdfda991066bb9286ab | d20cea6b895eb7f5595d3dc1ad65204e |
      | f9647df96d044807225e9035bd877698 | Digitale Medien im DaF-Unterricht                                                                                       |             | 1096581600  | 31536000       | 7558859e74507b0bf0a1af83b4fe4d22 | b4398caa75793474e2d6b00dc4b4a608 |

Scenario: Set new english coursename
    Given I have translator role
    When I input the name "English Test" for course "96d42d57882c5015e42e48e277acc280"
    Then I should changed the coursename
    And english coursename schould be "English Test"
    
Scenario: Set empty english coursename
    Given I have translator role
    And suggestor suggest "Test" as english name
    When I input the name "" for course "96d42d57882c5015e42e48e277acc280"
    Then I should changed the coursename
    And english coursename schould be "Test"

Scenario: replace english coursename
    Given I have translator role
    When I input the name "English Test" for course "698d818c9a9e9480eb75cabba0b81c09"
    Then I should changed the coursename
    And english coursename schould be "English Test"
