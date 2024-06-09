# Application for Optimizing Antibiotic Prophylaxis at Trueta Hospital

This project describes the development of an application aimed at optimizing antibiotic prophylaxis at Trueta Hospital. The goal of the application is to assist anesthesiologists in the correct choice of antibiotics, ensuring better efficiency and effectiveness in clinical decision-making regarding antibiotic prophylaxis.

## Project Objectives

- Assist in the selection of antibiotics for prophylaxis.
- Increase efficiency and effectiveness in clinical decision-making.
- Reduce errors in antibiotic prescription.
- Provide an intuitive and easy-to-use interface.
- Ensure the security and scalability of the application.

## System Requirements

### User Requirements

- Intuitive interface
- Ease of use
- Accessibility

### Technical Requirements

- Data security (encryption, robust authentication, and authorization)
- Scalability
- Development and Production Environment:
  - Laravel for the backend
  - Vue.js with Inertia.js for the frontend
  - MySQL as the database
  - Docker for containerization
- Server requirements:
  - Linux, Nginx or Apache, PHP 8.2 or higher, MySQL 8.0 or higher, Docker 26.00 or higher, Composer, Node.js, and npm

## System Architecture

### Main Components

- User Interface (Frontend): Vue.js and Inertia.js
- Application Server (Backend): Laravel
- Database: MySQL
- Container System: Docker
- Web Server: Nginx

### System Architecture Diagram

![System Architecture Diagram](./diagramalol.jpg)

### Component Interaction

1. The user interacts with the user interface (Vue.js and Inertia.js).
2. Requests are sent to the application server (Laravel).
3. Laravel accesses the database (MySQL) to retrieve or store information.
4. Responses from the application server are sent back to the user interface.
5. All components are packaged in Docker containers.

### Technologies Used

- Programming Languages: PHP, JavaScript
- Databases: MySQL
- Frameworks and Libraries: Laravel, Vue.js, Inertia.js
- Containers: Docker
- Other Tools: Composer, npm, Node.js

## Application Development

### Development Methodology

The application was developed following the Agile/Scrum methodology with weekly sprints, daily meetings, and weekly meetings with representatives from Trueta Hospital.

### Development Phases

1. Planning
2. Design
3. Implementation
4. Testing
5. Deployment
6. Maintenance and Future Updates

### Screenshots and Features

#### Login Screen
![Login Screen](./demostració_desktop_login.png)

#### Main Screen
![Main Screen](./demostració_pantalla_principal__macbok.png)

#### Surgery Type Selection
![Surgery Type Selection](./mobile_recanvi_valvular.png)

#### Health Condition Selection
![Health Condition Selection](./condicions.png)

#### Condition Results
![Dosage Results](./resultats.png)

#### Antibiotic Information
![Antibiotic Information](./medic.png)

## Testing and Validation

- Unit Tests
- Integration Tests
- System Tests
- User Acceptance Tests

## Deployment

Deployment was carried out using Docker, allowing for a quick and consistent installation on the servers of Trueta Hospital.

## Conclusion and Future Development

This project has provided a valuable tool to optimize antibiotic prophylaxis at Trueta Hospital. Future improvements are proposed based on user feedback and the changing needs of the hospital.

## References

List of all sources cited throughout the document.

## Appendix

Additional information, detailed diagrams, programming code, test data, etc.
