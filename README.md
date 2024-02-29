## Simple PHP Link Shortening Service
### Introduction
This project implements a basic link shortening service using PHP. The service allows users to submit long URLs, which are then stored and replaced with shorter links. When accessed, these shorter links redirect users to the original URL.

### Features
- Accepts regular (long) URLs.
- Generates shorter links.
- Redirects to the original URL when accessed.
- Minimizes the length of shortened links.
- Visitor counter for each shortened URL.

### Implementation Details
- Backend: Developed using PHP (Laravel framework).
- Frontend: Minimal investment; focus on API functionality.
- Database: Utilized for storing original and shortened URLs, along with visitor counts(Using Mysql).
- API: Provides endpoints for URL submission, redirection, and visitor count retrieval.

### Getting Started
#### For Linux:
- Clone this repository(**git clone <repository_url>**).
- customize the ENV file according to your environment (.env.example -> .env)
- **cd <project_directory>**
- Start Laravel Sail:
  Laravel Sail simplifies the process of running Laravel applications with Docker. In the project directory, you should find a vendor directory which contains the Laravel Sail files. Run the following command:
  **./vendor/bin/sail up**
- if port conflicts occur, you can pause the local server and MySQL with these commands : "**sudo systemctl stop nginx**" and "**sudo systemctl stop mysql**"
- Once Sail is up and running, you can access the Laravel application in your web browser at localhost. Laravel Sail automatically configures the necessary ports and mappings.
- To stop the Laravel Sail environment, simply press Ctrl + C in the terminal where it's running. This will stop all Docker containers associated with Sail.
- Access the API endpoints to submit, access shortened links, and retrieve visitor counts.
### Usage
#### Submitting a URL
- Endpoint: /shorten
- Method: POST
- Payload: { "url": "https://example.com" }
- Response: { "shortened_url": "http://localhost/TZvcSP"}
### Accessing a Shortened URL
- Shortened URL: http://localhost/TZvcSP
- Behavior: Redirects to the original URL (https://example.com).
### Incremented visitor count for each access.
- Retrieving Visitor Count
- Endpoint: /visitors/{code}
- Method: GET
- Response: { "visitor_count": 25 } (Example response with visitor count)
