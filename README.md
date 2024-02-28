# Conceptualization of Microservice Architecture

This project was built in conjuncture of a technical assessment with Vimigo

The aim of this project is to create a proof of concept (POC) of the Microservice Architecture which has been rising in popularity.

A microservice is a software development approach where an application is structured as a collection of small, loosely coupled, and independently deployable services. Each microservice is responsible for a specific business function and can be developed, deployed, and scaled independently. Microservices communicate with each other typically through lightweight mechanisms such as HTTP/REST or messaging protocols. This architectural style promotes agility, scalability, and resilience in complex systems.

## General Architecture Implemented
In this project, the following technologies are utilized
- **Laravel Framework**
The Laravel framework is mainly used throughout the project to create the individual microservices. This framework is used mainly due to my familiarity to the framework and PHP language. Any language that suites each individual service's purposes can be used freely
- **API Gateway - Laravel Passport**
I have leveraged on one of the existing Laravel authentication package to create an API Gateway, which is one of the popular concept for handling authorization of microservice architecture. All clients' request will go through the API Gateway, validated, authenticated, rerouted, depending on the services or information they require.

## Current Features

* API Gateway and Authentication
    * User/Client Authetication
    * User Profile
* Playlist Recommendation
    * Get Recommendation by User ID
* Subscription Service
    * Get Product List
    * Get My Subscription
    * New Subscription

## Running the Environment
The project is split into 3 service application folder, namely **api-gateway**, **apiplaylist-recommendation** and **subscription**

Following the instructions in the README.md file of each application to run the environment

## Postman Link
Please refer to the [this link](https://documenter.getpostman.com/view/10405264/2sA2rFTLKb) for the postman documentation and API Endpoints
