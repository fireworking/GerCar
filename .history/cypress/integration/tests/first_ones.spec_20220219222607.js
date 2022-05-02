describe('home_page', () => {
    beforeEach(() => {
        cy.visit('/');
    });
    it('can visit register page', () => {
        cy.contains('Register Company').click();
        cy.contains('h2', 'Register Company');
    });
});

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
        cy.get('#name').type('heybro');
        cy.get('#cnpj').type('00623904000173');
        cy.get('#email').type('jaykey@rollain.com');
        cy.get('#password').type('heyheyhey');
        cy.get('#confirm-password').type('heyheyhey');
        cy.get('#state').click();
        cy.get('[value="RO"]').click();
        
    });
});