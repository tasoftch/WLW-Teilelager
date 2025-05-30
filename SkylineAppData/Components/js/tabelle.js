
class Emitter {
    constructor(events) {
        this.events = events instanceof Emitter ? events.events : events;
    }

    on(names, handler) {
        const events = typeof names === 'string' ? names.split(' ') : names;
        events.forEach(name=>{
            if (!this.events[name])
                throw new Error(`The event ${name} does not exist`);
            this.events[name].push(handler);
        });
        return this;
    }

    trigger(name, params) {
        if (!(name in this.events))
            throw new Error(`The event ${name} cannot be triggered`);
        let result = true;
        let self = this;
        this.events[name].forEach(fn=>{
            if(typeof fn ==='function') {
                result = fn.call(self, params) && result;
            }
        });
        return result;
    }

    bind(name) {
        if (this.events[name])
            throw new Error(`The event ${name} is already bound`);
        this.events[name] = [];
    }

    exists(name) {
        return Array.isArray(this.events[name]);
    }
}

class Tabelle extends Emitter {
    constructor(id) {
        super({
            structureloaded:[],
            rowinserted:[],
            buttonclicked: [],
            sortchanged:[],
            loaddata:[]
        })

        this.id = id;
        this.el = $("#"+id)

        const $tpl = this.el.find("tbody tr.template");
        this.template = $tpl.html();
        $tpl.remove();

        this.container = this.el.find("tbody");
        const self = this;

        this.el.find("thead tr th.sortable").on("click", function() {
            const $hdr = $(this);

            if($hdr.hasClass("sort-desc")) {
                $hdr.removeClass("sort-desc")
            } else if($hdr.hasClass("sort-asc")) {
                $hdr.removeClass("sort-asc").addClass("sort-desc");
            } else {
                $hdr.addClass("sort-asc");
            }

            const sorters = {};
            self.el.find("thead tr th.sortable").each(function() {
                if($(this).hasClass("sort-asc"))
                    sorters[ $(this).attr("data-ref") ] = true;
                else if($(this).hasClass("sort-desc"))
                    sorters[ $(this).attr("data-ref") ] = false;
            })

            self.trigger('sortchanged', sorters)
        })

        this.trigger('structureloaded');
    }

    insertDataRow(id, data) {
        const $row = $("<tr data-ref='"+id+"'></tr>").html(this.template);
        const self = this;

        $row.find("td[data-ref]").each(function() {
            const attr_name = $(this).attr('data-ref');
            $(this).html( self.formatValue(attr_name, data) );
        })


        $row.find("button").on("click", function() {
            const action = $(this).attr("data-action");
            self.trigger("buttonclicked", {action, id, data, row:$row})
        });

        this.container.append($row);
        this.trigger("rowinserted", {row:$row, id})
    }

    formatValue(name, value) {
        if(value.hasOwnProperty(name))
            return value[name];
        return "??";
    }

    clearData() {
        this.container.html("");
    }
}


class OrganisierteTabelle extends Tabelle {
    constructor(id) {
        super(id);

        this.mat_pos = this.el.find("tfoot .total-marker");

        this.current_page = 1;
        this.total_pages_count = 0;
        this.total_rows_count = 0;
        this.page_count = 10;
        this.order_command = 1;

        const self = this;

        this.headers = new Map();

        this.el.find("thead th.sortable").each( function() {
            const ref = $(this).data("ref");
            self.headers.set(ref, $(this));
        });

        this.el.find("tfoot span.page-move").on('click', function() {
            if($(this).hasClass("first")) {
                self.gotoPage(1)
            } else if($(this).hasClass("prev")) {
                if(self.current_page > 1)
                    self.gotoPage( self.current_page - 1 );
            } else if($(this).hasClass("next")) {
                if(self.current_page < self.total_pages_count)
                    self.gotoPage( self.current_page + 1 );
            } else if($(this).hasClass("last")) {
                self.gotoPage( self.total_pages_count );
            }
        })

        this.mat_page = this.el.find("input.page-counter").on("change", function() {
            const page = $(this).val();
            if(page <= self.total_pages_count)
                self.gotoPage(page);
            $(this).val("");
        });

        this.el.find("tfoot select.page-count").on('change', function() {
            self.page_count = $(this).val();
            self.gotoPage(1, true);
        })

        this.on("sortchanged", (sorters) => {
            // Nur name eingestellt.
            if(typeof sorters.name === 'boolean') {
                this.order_command = sorters.name ? 1 : -1;
            } else {
                this.order_command = 0;
            }

            this.reloadContents();
        })
    }

    reloadContents() {
        this.gotoPage(1, true);
    }

    gotoPage(page, forced=false) {
        if(forced || page !== this.current_page) {
            this.current_page = page;
            this.trigger('loaddata', {page, from: (page-1) * this.page_count, count:this.page_count, order:this.order_command })
        }
    }

    updatePageLocation(from, page_count, total_items) {
        const to = Math.min(from + page_count, total_items);
        this.mat_pos.text(`${from*1 + 1} - ${to} / ${total_items}`);

        const page = Math.floor(from / page_count) + 1;
        const totalPages = Math.ceil(total_items / page_count);

        this.mat_page.attr("placeholder", `${page} / ${totalPages}`)
        this.total_pages_count = totalPages;
        this.total_rows_count = total_items * 1;
    }

    updateSortDescriptors(sortDescriptors) {
        this.headers.forEach(hdr => hdr.removeClass("sort-asc sort-desc"));
        this.order_command = 0;

        if(typeof sortDescriptors === 'object') {
            for(const k in sortDescriptors) {
                if(this.headers.has(k)) {
                    const hdr = this.headers.get(k);
                    if(sortDescriptors[k]) {
                        this.order_command = 1;
                        hdr.addClass("sort-asc")
                    }
                    else {
                        this.order_command = -1;
                        hdr.addClass('sort-desc');
                    }
                }
            }
        }
    }
}

