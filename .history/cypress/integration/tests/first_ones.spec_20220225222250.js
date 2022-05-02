describe('home_page', () => {
    beforeEach(() => {
        cy.visit('/');
    });
    it('can visit register page', () => {
        cy.contains('Register Company').click();
        cy.contains('h2', 'Register Company');
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
    it('can register and go to profile page', () => {
        registerExampleCompany();
        cy.contains('div', 'heybro');
    });
    it('cant register the same company twice', () => {
        registerExampleCompany();
        cy.contains('The name has already been taken.');
        cy.contains('The cnpj has already been taken.');
        cy.contains('The email has already been taken.');
    });
});

describe