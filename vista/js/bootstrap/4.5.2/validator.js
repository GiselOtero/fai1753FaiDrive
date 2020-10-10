$("#formArmar").bootstrapValidator({
  /* armarArchivo.php */
  message: "Este valor no es valido",

  feedbackIcons: {
    valid: "fa fa-check",

    invalid: "fas fa-times",

    validating: "fa fa-circle",
  },

  fields: {
    nombreArchivo: {
      validators: {
        notEmpty: {
          message: "El nombre del archivo es requerido",
        },
      },
    },
    usuario: {
      validators: {
        notEmpty: {
          message: "Seleccione un usuario",
        },
      },
    },
  },
});
/* compartir archivo */
$("#formCompartir").bootstrapValidator({
  message: "Este valor no es valido",

  feedbackIcons: {
    valid: "fa fa-check",

    invalid: "fas fa-times",

    validating: "fa fa-circle",
  },

  fields: {
    usuario: {
      validators: {
        notEmpty: {
          message: "Seleccione un usuario",
        },
      },
    },
    
  },
});
/* formulario Eliminar Archivo */
$("#formEliminar").bootstrapValidator({
  message: "Este valor no es valido",

  feedbackIcons: {
    valid: "fa fa-check",

    invalid: "fas fa-times",

    validating: "fa fa-circle",
  },

  fields: {
    usuario: {
      validators: {
        notEmpty: {
          message: "Seleccione un usuario",
        },
      },
    },
    motivoElim: {
      validators: {
        notEmpty: {
          message: "Escriba el motivo de eliminacion",
        },
      },
    },
  },
});
/* formulario Eliminar Archivo compartido */
$("#formEliminarArchivoCompartido").bootstrapValidator({
  message: "Este valor no es valido",

  feedbackIcons: {
    valid: "fa fa-check",

    invalid: "fas fa-times",

    validating: "fa fa-circle",
  },

  fields: {
    usuario: {
      validators: {
        notEmpty: {
          message: "Seleccione un usuario",
        },
      },
    },
    motivo: {
      validators: {
        notEmpty: {
          message: "Escriba el motivo para dejar de compartir",
        },
      },
    },
  },
});
/* formulario contenido crear carpera*/
$("#formCrearCarpeta").bootstrapValidator({
  message: "Este valor no es valido",

  feedbackIcons: {
    valid: "fa fa-check",

    invalid: "fas fa-times",

    validating: "fa fa-circle",
  },

  fields: {
    nombreCarpeta: {
      validators: {
        notEmpty: {
          message: "Ingrese un Nombre de Carpeta",
        },
        /* regexp: {
          regexp: /^[a-zA-Z0-9]+([a-zA-Z0-9](_|-| )[a-zA-Z0-9])*[a-zA-Z0-9]+$/,
          message: " Ingrese una cadena válida",
        }, */
      },
    },
    
  },
});
