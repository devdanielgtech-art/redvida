// CustomAlert Library - Versión 1.0
class CustomAlert {
    constructor() {
        this.overlay = null;
        this.container = null;
        this.currentResolve = null;
    }

    // Método principal para mostrar alertas
    static fire(options = {}) {
        return new CustomAlert().show(options);
    }

    // Método para confirmaciones
    static confirm(options = {}) {
        const confirmOptions = {
            ...options,
            showCancelButton: true,
            confirmButtonText: options.confirmButtonText || 'Sí',
            cancelButtonText: options.cancelButtonText || 'Cancelar'
        };
        return new CustomAlert().show(confirmOptions);
    }

    // Método para prompts (entrada de texto)
    static prompt(options = {}) {
        const promptOptions = {
            ...options,
            input: true,
            showCancelButton: true,
            confirmButtonText: options.confirmButtonText || 'Aceptar',
            cancelButtonText: options.cancelButtonText || 'Cancelar'
        };
        return new CustomAlert().show(promptOptions);
    }

    // Métodos de conveniencia
    static success(title, text) {
        return this.fire({ type: 'success', title, text });
    }

    static error(title, text) {
        return this.fire({ type: 'error', title, text });
    }

    static warning(title, text) {
        return this.fire({ type: 'warning', title, text });
    }

    static delete(title, text) {
        return this.fire({ type: 'delete', title, text });
    }

    static info(title, text) {
        return this.fire({ type: 'info', title, text });
    }

    show(options) {
        return new Promise((resolve) => {
            this.currentResolve = resolve;
            this.createOverlay();
            this.createContainer(options);
            this.showAlert();
        });
    }

    createOverlay() {
        this.overlay = document.createElement('div');
        this.overlay.className = 'custom-alert-overlay';
        this.overlay.addEventListener('click', (e) => {
            if (e.target === this.overlay) {
                this.close(false);
            }
        });
        document.body.appendChild(this.overlay);
    }

    createContainer(options) {
        this.container = document.createElement('div');
        this.container.className = 'custom-alert-container';

        let html = '';

        // Icono
        if (options.type) {
            const iconSymbols = {
                success: '✓',
                error: '✕',
                warning: '⚠',
                info: 'i',
                delete:'\u{1F5D1}'
            };
            html += `<div class="custom-alert-icon ${options.type}">${iconSymbols[options.type]}</div>`;
        }

        // Título
        if (options.title) {
            html += `<h2 class="custom-alert-title">${options.title}</h2>`;
        }

        // Texto
        if (options.text) {
            html += `<p class="custom-alert-text">${options.text}</p>`;
        }

        // Input para prompt
        if (options.input) {
            html += `<input type="text" class="custom-alert-input" placeholder="${options.inputPlaceholder || 'Ingresa tu respuesta...'}">`;
        }

        // Botones
        html += '<div class="custom-alert-buttons">';
        
        if (options.showCancelButton) {
            html += `<button class="custom-alert-btn cancel" data-action="cancel">${options.cancelButtonText || 'Cancelar'}</button>`;
        }
        
        html += `<button class="custom-alert-btn ${options.showCancelButton ? 'confirm' : 'default'}" data-action="confirm">${options.confirmButtonText || 'Aceptar'}</button>`;
        
        html += '</div>';

        this.container.innerHTML = html;

        // Event listeners para botones
        this.container.addEventListener('click', (e) => {
            if (e.target.classList.contains('custom-alert-btn')) {
                const action = e.target.getAttribute('data-action');
                if (action === 'confirm') {
                    if (options.input) {
                        const input = this.container.querySelector('.custom-alert-input');
                        this.close(input.value);
                    } else {
                        this.close(true);
                    }
                } else {
                    this.close(false);
                }
            }
        });

        // Focus en input si existe
        setTimeout(() => {
            const input = this.container.querySelector('.custom-alert-input');
            if (input) input.focus();
        }, 300);

        this.overlay.appendChild(this.container);
    }

    showAlert() {
        setTimeout(() => {
            this.overlay.classList.add('show');
        }, 10);

        // Cerrar con ESC
        this.escListener = (e) => {
            if (e.key === 'Escape') {
                this.close(false);
            }
        };
        document.addEventListener('keydown', this.escListener);
    }

    close(result) {
        this.overlay.classList.remove('show');
        document.removeEventListener('keydown', this.escListener);
        
        setTimeout(() => {
            if (this.overlay && this.overlay.parentNode) {
                this.overlay.parentNode.removeChild(this.overlay);
            }
            if (this.currentResolve) {
                this.currentResolve(result);
            }
        }, 300);
    }
}