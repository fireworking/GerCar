const { describe } = require("mocha");

describe('home_page', () => {
    beforeEach(() => {
        cy.visit('/');
    });
    it('can visit register page', () => {
        cy.contains('Register Company').click();
        cy.contains('h2', 'Register Company');
    });
    it('can visit login page', () => {
        cy.contains('Login').click();
        cy.contains('h2', 'Login');
    });
});

function registerExampleCompany(){
    cy.get('#name').type('heybro');
    cy.get('#cnpj').type('00623904000173');
    cy.get('#email').type('jaykey@rollain.com');
    cy.get('#password').type('heyheyhey');
    cy.get('#confirm-password').type('heyheyhey');
    cy.get('#state').select('RO');
    cy.get('#city').select('Alto Alegre dos Parecis');
    cy.get('#terms-of-service').click();
    cy.get('#register').click();
}

function registerExampleCompany(){
    cy.get('#email').type('jayky@rollin.com');
    cy.get('#password').type('heyheyhey');
    cy.get('#confirm-password').type('heyheyhey');
    cy.get('#register').click();
}

describe('register_company_page', () => {
    beforeEach(() => {
        cy.visit('/register-company');
    });
    it('shows errors and old values accordingly', () => {
        cy.get('#cnpj').type('00623904000173');
        cy.get('#register').click();
        cy.contains('The cnpj field is required').should('not.exist');
        cy.contains('You must check the box to continue.');
        cy.contains('The name field is required');
        cy.get('#cnpj').should('have.value', '00.623.904/0001-73');
    });
    it('can register and go to vehicles page', () => {
        registerExampleCompany();
        cy.contains('h1', 'Vehicles');
    });
    it('cant register the same company twice', () => {
        registerExampleCompany();
        cy.contains('The name has already been taken.');
        cy.contains('The cnpj has already been taken.');
        cy.contains('The email has already been taken.');
    });
    it('can visit login page', () => {
        cy.contains('Login').click();
        cy.contains('h2', 'Login');
    });
});

describe('login_page', () => {
    beforeEach(() => {
        cy.visit('/login');
    });
    it('can login and go to vehicles page', () => {
        cy.get('#email').type('jaykey@rollain.com');
        cy.get('#password').type('heyheyhey');
        cy.get('#register').click();
        cy.contains('h1', 'Vehicles');
    });
    it('cant login a non-existent account', () => {
        cy.get('#email').type('jk@roll.com');
        cy.get('#password').type('heydifferenthey');
        cy.get('#register').click();
        cy.contains('The provided credentials do not match any account');
    });
    it('can visit register page', () => {
        cy.contains('register your company').click();
        cy.contains('h2', 'Register Company');
    });
});

describe('register_colaborator_page', () => {
    it('shows flash message when registering a colaborator', () => {
        cy.get('#email').type('jaykey@rollain.com');
        cy.get('#password').type('heyheyhey');
        cy.get('#register').click();
        cy.contains('Colaborators').click();
        cy.registerExampleCompany
    });
});