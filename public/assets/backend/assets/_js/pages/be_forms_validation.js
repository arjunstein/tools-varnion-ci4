/*
 *  Document   : be_forms_validation.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Forms Validation Page
 */

// Form Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
class pageFormsValidation {
  /*
   * Init Validation functionality
   *
   */
  static initValidation() {
    // Load default options for jQuery Validation plugin
    One.helpers('jq-validation');

    // Init Form Validation
    jQuery('.js-validation').validate({
      ignore: [],
      rules: {
        'val-username': {
          required: true,
          minlength: 3
        },
        'val-email': {
          required: true,
          emailWithDot: true
        },
        'val-password': {
          required: true,
        },
        'val-confirm-password': {
          required: true,
          equalTo: '#val-password'
        },
        'val-suggestions': {
          required: true,
          minlength: 5
        },
        'val-skill': {
          required: true
        },
        'val-currency': {
          required: true,
          currency: ['$', true]
        },
        'val-website': {
          required: true,
          url: true
        },
        'val-phoneus': {
          required: true,
          phoneUS: true
        },
        'val-digits': {
          required: true,
          digits: true
        },
        'val-number': {
          required: true,
          number: true
        },
        'val-range': {
          required: true,
          range: [1, 5]
        },
        'val-terms': {
          required: true
        },
        'val-select2': {
          required: true
        },
        'val-privilege': {
          required: true
        },
        'val-select2-multiple': {
          required: true,
          minlength: 2
        },
        // Create Tam
        'val-nameTeam': {
          required: true
        },
        // Create Tam
        'val-nameIncomingCase': {
          required: true
        },
        // Create Categories
        'val-nameCategory': {
          required: true
        },
        'val-nameCategoryExternal': {
          required: true
        },
        'val-nameCategoryGamas': {
          required: true
        },
        'val-nameCategoryNotes': {
          required: true
        },
        'val-nameCategoryPrivilege': {
          required: true
        },
        'val-nameInternalTool': {
          required: true
        },
        'val-urlInternalTool': {
          required: true
        },
        'val-description': {
          required: true
        },
        'val-categories': {
          required: true
        },
      },
      messages: {
        'val-username': {
          required: 'Username cannot be empty!',
        },
        'val-email': 'Please enter a valid email address',
        'val-password': {
          required: 'Password cannot be empty!',
        },
        'val-confirm-password': {
          required: 'Please provide a password',
          minlength: 'Your password must be at least 5 characters long',
          equalTo: 'Please enter the same password as above'
        },
        'val-select2': 'Please select a value!',
        'val-privilege': 'Privilege must be selected!',
        'val-select2-multiple': 'Please select at least 2 values!',
        'val-suggestions': 'What can we do to become better?',
        'val-skill': 'Please select a skill!',
        'val-currency': 'Please enter a price!',
        'val-website': 'Please enter your website!',
        'val-phoneus': 'Please enter a US phone!',
        'val-digits': 'Please enter only digits!',
        'val-number': 'Please enter a number!',
        'val-range': 'Please enter a number between 1 and 5!',
        'val-terms': 'You must agree to the service terms!',
        // Create Teams
        'val-nameTeam': {
          required: 'Name Team cannot be empty!',
        },
        // Create Incoming Case
        'val-nameIncomingCase': {
          required: 'Name Incoming Case cannot be empty!',
        },
        // Create Categories
        'val-nameCategory': {
          required: 'Name Category cannot be empty!',
        },
        'val-nameCategoryExternal': {
          required: 'Name Category External cannot be empty!',
        },
        'val-nameCategoryGamas': {
          required: 'Name Category Gamas cannot be empty!',
        },
        'val-nameCategoryNotes': {
          required: 'Name Category Gamas cannot be empty!',
        },
        'val-nameCategoryPrivilege': {
          required: 'Name Category Gamas cannot be empty!',
        },
        'val-nameInternalTool': {
          required: 'Name Internal Tool cannot be empty!',
        },
        'val-urlInternalTool': {
          required: 'URL Internal Tool cannot be empty!',
        },
        'val-description': {
          required: 'Description cannot be empty!',
        },
        'val-categories': {
          required: 'Categories must be selected!',
        },
      },
      
    });

    // Init Validation on Select2 change
    jQuery('.js-select2').on('change', e => {
      jQuery(e.currentTarget).valid();
    });
  }

  /*
   * Init functionality
   *
   */
  static init() {
    this.initValidation();
  }
}

// Initialize when page loads
One.onLoad(() => pageFormsValidation.init());
