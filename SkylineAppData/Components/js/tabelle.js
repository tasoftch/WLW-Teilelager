
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
            buttonclicked: []
        })

        this.id = id;
        this.el = $("#"+id)

        const $tpl = this.el.find("tbody tr.template");
        this.template = $tpl.html();
        $tpl.remove();

        this.container = this.el.find("tbody");
        this.trigger('structureloaded');
    }

    insertDataRow(id, data) {
        const $row = $("<tr data-ref='"+id+"'></tr>").html(this.template);

        $row.find("td[data-ref]").each(function() {
            const attr_name = $(this).attr('data-ref');
            $(this).text( data.hasOwnProperty(attr_name) ? data[attr_name] : "??" );
        })

        const self = this;
        $row.find("button").on("click", function() {
            const action = $(this).attr("data-action");
            self.trigger("buttonclicked", {action, id, data, row:$row})
        });

        this.container.append($row);
        this.trigger("rowinserted", {row:$row, id})
    }

    clearData() {
        this.container.html("");
    }
}
