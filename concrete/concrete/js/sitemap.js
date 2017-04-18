! function(a, b, c) {
    "use strict";

    function d(a, c) {
        var d = this;
        return c = c || {}, c = b.extend({
            displayNodePagination: !1,
            cParentID: 0,
            siteTreeID: 0,
            cookieId: "ConcreteSitemap",
            includeSystemPages: !1,
            displaySingleLevel: !1,
            persist: !0,
            minExpandLevel: !1,
            dataSource: CCM_TOOLS_PATH + "/dashboard/sitemap_data",
            ajaxData: {},
            selectMode: !1,
            onClickNode: !1,
            onSelectNode: !1,
            init: !1
        }, c), d.options = c, d.$element = a, d.$sitemap = null, d.setupTree(), d.setupTreeEvents(), Concrete.event.publish("ConcreteSitemap", this), d.$element
    }
    d.prototype = {
        sitemapTemplate: '<div class="ccm-sitemap-wrapper"><div class="ccm-sitemap-locales-wrapper"></div><div class="ccm-sitemap-tree"></div></div>',
        localesWrapperTemplate: '<ul class="nav nav-tabs ccm-sitemap-locales"></ul>',
        localeTemplate: '<li <% if (selectedLocale) { %>class="active"<% } %>><a href="#" data-locale-site-tree="<%=treeID%>"><img src="<%=icon%>"> <span><%=localeDisplayName%></span></a></li>',
        getTree: function() {
            var a = this;
            return a.$sitemap.fancytree("getTree")
        },
        setupLocales: function(a) {
            var d = this;
            if (a && !(a.length < 2 || d.$element.find("div.ccm-sitemap-locales-wrapper ul").length)) {
                for (var e = b(d.localesWrapperTemplate), f = c.template(d.localeTemplate), g = 0; g < a.length; g++) {
                    var h = a[g];
                    e.append(f(h))
                }
                e.find("a[data-locale-site-tree]").on("click", function(a) {
                    a.preventDefault();
                    var c = b(this).attr("data-locale-site-tree"),
                        f = d.getTree().options.source;
                    e.find("li").removeClass("active"), b(this).parent().addClass("active"), d.options.siteTreeID = c, f.data.siteTreeID = c, d.getTree().reload(f)
                }), d.$element.find("div.ccm-sitemap-locales-wrapper").append(e)
            }
        },
        setupTree: function() {
            var a, d = this,
                e = !0,
                f = 1,
                g = !1,
                h = !1;
            "single" == d.options.selectMode ? (g = !0, h = {
                checkbox: "fancytree-radio"
            }) : "multiple" == d.options.selectMode ? (f = 2, g = !0) : "hierarchical-multiple" == d.options.selectMode && (f = 3, g = !0), g && (e = !1), d.options.minExpandLevel !== !1 ? a = d.options.minExpandLevel : d.options.displaySingleLevel ? (a = 1 == d.options.cParentID ? 2 : 3, e = !1) : a = d.options.selectMode ? 2 : 1, d.options.persist || (e = !1);
            var i = b.extend({
                    displayNodePagination: d.options.displayNodePagination ? 1 : 0,
                    cParentID: d.options.cParentID,
                    siteTreeID: d.options.siteTreeID,
                    displaySingleLevel: d.options.displaySingleLevel ? 1 : 0,
                    includeSystemPages: d.options.includeSystemPages ? 1 : 0
                }, d.options.ajaxData),
                j = ["glyph", "dnd"];
            e && j.push("persist");
            var k = c.template(d.sitemapTemplate);
            d.$element.append(k), d.$sitemap = d.$element.find("div.ccm-sitemap-tree"), b(d.$sitemap).fancytree({
                tabindex: null,
                titlesTabbable: !1,
                extensions: j,
                glyph: {
                    map: {
                        doc: "fa fa-file-o",
                        docOpen: "fa fa-file-o",
                        checkbox: "fa fa-square-o",
                        checkboxSelected: "fa fa-check-square-o",
                        checkboxUnknown: "fa fa-share-square",
                        dragHelper: "fa fa-share",
                        dropMarker: "fa fa-angle-right",
                        error: "fa fa-warning",
                        expanderClosed: "fa fa-plus-square-o",
                        expanderLazy: "fa fa-plus-square-o",
                        expanderOpen: "fa fa-minus-square-o",
                        loading: "fa fa-spin fa-refresh"
                    }
                },
                persist: {
                    cookieDelimiter: "~",
                    cookiePrefix: d.options.cookieId,
                    cookie: {
                        path: CCM_REL + "/"
                    }
                },
                autoFocus: !1,
                classNames: h,
                source: {
                    url: d.options.dataSource,
                    data: i
                },
                init: function() {
                    d.options.init && d.options.init.call(), d.options.displayNodePagination && d.setupNodePagination(d.$sitemap, d.options.cParentID), d.setupLocales(d.getTree().data.locales)
                },
                selectMode: f,
                checkbox: g,
                minExpandLevel: a,
                clickFolderMode: 2,
                lazyLoad: function(a, b) {
                    return !d.options.displaySingleLevel && void(b.result = d.getLoadNodePromise(b.node))
                },
                click: function(a, c) {
                    var e = c.node;
                    if ("title" == c.targetType && e.data.cID) {
                        if (d.options.selectMode) return !1;
                        if (d.options.onClickNode) return d.options.onClickNode.call(d, e);
                        var f = new ConcretePageMenu(b(e.li), {
                            menuOptions: d.options,
                            data: e.data,
                            sitemap: d,
                            onHide: function(a) {
                                a.$launcher.each(function() {
                                    b(this).unbind("mousemove.concreteMenu")
                                })
                            }
                        });
                        f.show(a)
                    } else if (e.data.href) window.location.href = e.data.href;
                    else if (d.options.displaySingleLevel) return d.displaySingleLevel(e), !1
                },
                select: function(a, b, c) {
                    d.options.onSelectNode && d.options.onSelectNode.call(d, b.node, b.node.isSelected())
                },
                dnd: {
                    preventRecursiveMoves: !0,
                    focusOnClick: !0,
                    preventVoidMoves: !0,
                    dragStart: function(a, b) {
                        return !d.options.selectMode && !!a.data.cID
                    },
                    dragStop: function(a, b) {
                        return !0
                    },
                    dragEnter: function(a, b) {
                        return !(!a.parent.data.cID && "1" !== a.data.cID) && (1 == a.data.cID ? "over" : a.data.cID != b.otherNode.data.cID && (!(!b.otherNode.data.cID && "after" == b.hitMode) && !a.isDescendantOf(b.otherNode)))
                    },
                    dragDrop: function(a, b) {
                        a.parent.data.cID == b.otherNode.parent.data.cID && "over" != b.hitMode ? (b.otherNode.moveTo(a, b.hitMode), d.rescanDisplayOrder(b.otherNode.parent)) : d.selectMoveCopyTarget(b.otherNode, a, b.hitMode)
                    }
                }
            })
        },
        setupTreeEvents: function() {
            var a = this;
            return !a.options.selectMode && !a.options.onClickNode && (ConcreteEvent.unsubscribe("SitemapDeleteRequestComplete.sitemap"), ConcreteEvent.subscribe("SitemapDeleteRequestComplete.sitemap", function(b) {
                    var c = a.$sitemap.fancytree("getActiveNode"),
                        d = c.parent;
                    a.reloadNode(d)
                }), ConcreteEvent.unsubscribe("SitemapAddPageRequestComplete.sitemap"), ConcreteEvent.subscribe("SitemapAddPageRequestComplete.sitemap", function(b, c) {
                    var d = a.getTree().getNodeByKey(c.cParentID);
                    d && a.reloadNode(d), jQuery.fn.dialog.closeAll()
                }), void ConcreteEvent.subscribe("SitemapUpdatePageRequestComplete.sitemap", function(b, c) {
                    try {
                        var d = a.getTree().getNodeByKey(c.cID),
                            e = d.parent;
                        e && a.reloadNode(e)
                    } catch (a) {}
                }))
        },
        rescanDisplayOrder: function(a) {
            var c, d = a.getChildren(),
                e = [];
            for (a.setStatus("loading"), c = 0; c < d.length; c++) {
                var f = d[c];
                e.push({
                    name: "cID[]",
                    value: f.data.cID
                })
            }
            b.concreteAjax({
                dataType: "json",
                type: "POST",
                data: e,
                url: CCM_TOOLS_PATH + "/dashboard/sitemap_update",
                success: function(b) {
                    a.setStatus("ok"), ConcreteAlert.notify({
                        message: b.message
                    })
                }
            })
        },
        selectMoveCopyTarget: function(a, c, d) {
            var e = this,
                f = ccmi18n_sitemap.moveCopyPage;
            if (!d) var d = "";
            var g = CCM_TOOLS_PATH + "/dashboard/sitemap_drag_request?origCID=" + a.data.cID + "&destCID=" + c.data.cID + "&dragMode=" + d,
                h = 350,
                i = 350;
            b.fn.dialog.open({
                title: f,
                href: g,
                width: i,
                modal: !1,
                height: h
            }), ConcreteEvent.unsubscribe("SitemapDragRequestComplete.sitemap"), ConcreteEvent.subscribe("SitemapDragRequestComplete.sitemap", function(b, f) {
                var g = c.parent;
                "over" == d && (g = c), "MOVE" == f.task && a.remove(), g.removeChildren(), e.reloadNode(g, function() {
                    c.bExpanded || c.setExpanded(!0, {
                        noAnimation: !0
                    })
                })
            })
        },
        setupNodePagination: function(a) {
            var c = a.find("div.ccm-pagination-wrapper"),
                d = this;
            a.children(".ccm-pagination-bound").remove(), c.length && (c.find("a").unbind("click").on("click", function() {
                var a = b(this).attr("href"),
                    c = d.$sitemap.fancytree("getRootNode");
                return jQuery.fn.dialog.showLoader(), b.ajax({
                    dataType: "json",
                    url: a,
                    success: function(a) {
                        jQuery.fn.dialog.hideLoader(), c.removeChildren(), c.addChildren(a), d.setupNodePagination(d.$sitemap)
                    }
                }), !1
            }), c.addClass("ccm-pagination-bound").appendTo(a))
        },
        displaySingleLevel: function(a) {
            var c = this,
                d = c.options;
            1 == a.data.cID ? 2 : 3;
            (c.options.onDisplaySingleLevel || b.noop).call(this, a);
            var e = c.$sitemap.fancytree("getRootNode"),
                f = b.extend({
                    dataType: "json",
                    displayNodePagination: d.displayNodePagination ? 1 : 0,
                    siteTreeID: d.siteTreeID,
                    cParentID: a.data.cID,
                    displaySingleLevel: !0,
                    includeSystemPages: d.includeSystemPages ? 1 : 0
                }, d.ajaxData);
            return jQuery.fn.dialog.showLoader(), b.ajax({
                dataType: "json",
                url: d.dataSource,
                data: f,
                success: function(b) {
                    jQuery.fn.dialog.hideLoader(), e.removeChildren(), e.addChildren(b), c.setupNodePagination(c.$sitemap, a.data.key)
                }
            })
        },
        getLoadNodePromise: function(a) {
            var c = this,
                d = c.options,
                e = b.extend({
                    cParentID: a.data.cID ? a.data.cID : 0,
                    siteTreeID: d.siteTreeID,
                    reloadNode: 1,
                    includeSystemPages: d.includeSystemPages ? 1 : 0,
                    displayNodePagination: d.displayNodePagination ? 1 : 0
                }, d.ajaxData),
                f = {
                    dataType: "json",
                    url: d.dataSource,
                    data: e
                };
            return b.ajax(f)
        },
        reloadNode: function(a, b) {
            this.getLoadNodePromise(a).done(function(c) {
                a.removeChildren(), a.addChildren(c), a.setExpanded(!0, {
                    noAnimation: !0
                }), b && b()
            })
        }
    }, d.exitEditMode = function(a) {
        b.get(CCM_TOOLS_PATH + "/dashboard/sitemap_check_in?cID=" + a + "&ccm_token=" + CCM_SECURITY_TOKEN)
    }, d.refreshCopyOperations = function() {
        ccm_triggerProgressiveOperation(CCM_TOOLS_PATH + "/dashboard/sitemap_copy_all", [], ccmi18n_sitemap.copyProgressTitle, function() {
            b(".ui-dialog-content").dialog("close"), window.location.reload()
        })
    }, d.submitDragRequest = function() {
        var a = b("#origCID").val(),
            c = (b("#destParentID").val(), b("#destCID").val()),
            d = b("#dragMode").val(),
            e = b("#destSibling").val(),
            f = b("input[name=ctask]:checked").val(),
            g = b("input[name=copyAll]:checked").val(),
            h = b("input[name=saveOldPagePath]:checked").val(),
            i = {
                origCID: a,
                destCID: c,
                ctask: f,
                ccm_token: CCM_SECURITY_TOKEN,
                copyAll: g,
                destSibling: e,
                dragMode: d,
                saveOldPagePath: h
            };
        if (1 == g) {
            var j = ccmi18n_sitemap.copyProgressTitle;
            ccm_triggerProgressiveOperation(CCM_TOOLS_PATH + "/dashboard/sitemap_copy_all", [{
                name: "origCID",
                value: a
            }, {
                name: "destCID",
                value: c
            }], j, function() {
                b(".ui-dialog-content").dialog("close"), ConcreteEvent.publish("SitemapDragRequestComplete", {
                    task: f
                })
            })
        } else jQuery.fn.dialog.showLoader(), b.getJSON(CCM_TOOLS_PATH + "/dashboard/sitemap_drag_request", i, function(a) {
            ccm_parseJSON(a, function() {
                jQuery.fn.dialog.closeAll(), jQuery.fn.dialog.hideLoader(), ConcreteAlert.notify({
                    message: a.message
                }), ConcreteEvent.publish("SitemapDragRequestComplete", {
                    task: f
                }), jQuery.fn.dialog.closeTop(), jQuery.fn.dialog.closeTop()
            })
        })
    }, b.fn.concreteSitemap = function(a) {
        return b.each(b(this), function(c, e) {
            new d(b(this), a)
        })
    }, a.ConcreteSitemap = d
}(this, $, _), ! function(a, b, c) {
    "use strict";

    function d(a, d) {
        var e = this,
            d = d || {};
        d = b.extend({
            sitemap: !1,
            data: {},
            menuOptions: {}
        }, d), ConcreteMenu.call(e, a, d), 0 != d.sitemap && (e.$menu = b(c.template(ConcretePageAjaxSearchMenu.get(), {
            item: d.data
        })))
    }
    d.prototype = Object.create(ConcreteMenu.prototype), d.prototype.setupMenuOptions = function(a) {
        var b = this,
            c = ConcreteMenu.prototype,
            d = a.attr("data-search-page-menu");
        b.options.container;
        c.setupMenuOptions(a), b.options.sitemap && 0 != b.options.sitemap.options.displaySingleLevel || a.find("[data-sitemap-mode=explore]").remove(), a.find("a[data-action=delete-forever]").on("click", function() {
            return ccm_triggerProgressiveOperation(CCM_TOOLS_PATH + "/dashboard/sitemap_delete_forever", [{
                name: "cID",
                value: d
            }], ccmi18n_sitemap.deletePages, function() {
                if (b.options.sitemap) {
                    var a = b.options.sitemap.getTree(),
                        c = a.getNodeByKey(d);
                    c.remove()
                }
                ConcreteAlert.notify({
                    message: ccmi18n_sitemap.deletePageSuccessMsg
                })
            }), !1
        }), a.find("a[data-action=empty-trash]").on("click", function() {
            return ccm_triggerProgressiveOperation(CCM_TOOLS_PATH + "/dashboard/sitemap_delete_forever", [{
                name: "cID",
                value: d
            }], ccmi18n_sitemap.deletePages, function() {
                if (b.options.sitemap) {
                    var a = b.options.sitemap.getTree(),
                        c = a.getNodeByKey(d);
                    c.removeChildren()
                }
            }), !1
        })
    }, b.fn.concretePageMenu = function(a) {
        return b.each(b(this), function(c, e) {
            new d(b(this), a)
        })
    }, a.ConcretePageMenu = d
}(this, $, _), ! function(a, b) {
    "use strict";

    function c(a, c) {
        var e = this;
        c = b.extend({
            mode: "menu",
            searchMethod: "get"
        }, c), e.options = c, e._templateSearchResultsMenu = _.template(d.get()), ConcreteAjaxSearch.call(e, a, c), e.setupEvents()
    }
    c.prototype = Object.create(ConcreteAjaxSearch.prototype), c.prototype.setupEvents = function() {
        var a = this;
        ConcreteEvent.subscribe("SitemapDeleteRequestComplete", function(b) {
            a.refreshResults()
        }), ConcreteEvent.fire("ConcreteSitemapPageSearch", a)
    }, c.prototype.updateResults = function(a) {
        var c = this,
            d = c.$element;
        ConcreteAjaxSearch.prototype.updateResults.call(c, a), "choose" == c.options.mode && (d.find(".ccm-search-results-checkbox").parent().remove(), d.find("select[data-bulk-action]").parent().remove(), d.unbind(".concretePageSearchHoverPage"), d.on("mouseover.concretePageSearchHoverPage", "tr[data-launch-search-menu]", function() {
            b(this).addClass("ccm-search-select-hover")
        }), d.on("mouseout.concretePageSearchHoverPage", "tr[data-launch-search-menu]", function() {
            b(this).removeClass("ccm-search-select-hover")
        }), d.unbind(".concretePageSearchChoosePage").on("click.concretePageSearchChoosePage", "tr[data-launch-search-menu]", function() {
            return ConcreteEvent.publish("SitemapSelectPage", {
                instance: c,
                cID: b(this).attr("data-page-id"),
                title: b(this).attr("data-page-name")
            }), !1
        }))
    }, c.prototype.handleSelectedBulkAction = function(a, c, d, e) {
        if ("movecopy" == a || "Move/Copy" == a) {
            var f, g = [];
            b.each(e, function(a, c) {
                g.push(b(c).val())
            }), ConcreteEvent.unsubscribe("SitemapSelectPage.search");
            var h = function(a, c) {
                Concrete.event.unsubscribe(a), f = CCM_TOOLS_PATH + "/dashboard/sitemap_drag_request?origCID=" + g.join(",") + "&destCID=" + c.cID, b.fn.dialog.open({
                    width: 350,
                    height: 350,
                    href: f,
                    title: ccmi18n_sitemap.moveCopyPage,
                    onDirectClose: function() {
                        ConcreteEvent.subscribe("SitemapSelectPage.search", h)
                    }
                })
            };
            ConcreteEvent.subscribe("SitemapSelectPage.search", h)
        }
        ConcreteAjaxSearch.prototype.handleSelectedBulkAction.call(this, a, c, d, e)
    }, ConcreteAjaxSearch.prototype.createMenu = function(a) {
        var c = this;
        a.concretePageMenu({
            container: c,
            menu: b("[data-search-menu=" + a.attr("data-launch-search-menu") + "]")
        })
    }, c.launchDialog = function(a) {
        var c = b(window).width() - 53;
        b.fn.dialog.open({
            width: c,
            height: "100%",
            href: CCM_TOOLS_PATH + "/sitemap_search_selector",
            modal: !0,
            title: ccmi18n_sitemap.pageLocationTitle,
            onClose: function() {
                ConcreteEvent.fire("PageSelectorClose")
            },
            onOpen: function() {
                ConcreteEvent.unsubscribe("SitemapSelectPage"), ConcreteEvent.subscribe("SitemapSelectPage", function(b, c) {
                    jQuery.fn.dialog.closeTop(), a(c)
                })
            }
        })
    }, c.getPageDetails = function(a, c) {
        b.ajax({
            type: "post",
            dataType: "json",
            url: CCM_DISPATCHER_FILENAME + "/ccm/system/page/get_json",
            data: {
                cID: a
            },
            error: function(a) {
                ConcreteAlert.dialog("Error", a.responseText)
            },
            success: function(a) {
                c(a)
            }
        })
    };
    var d = {
        get: function() {
            return '<div class="popover fade" data-search-page-menu="<%=item.cID%>" data-search-menu="<%=item.cID%>"><div class="arrow"></div><div class="popover-inner"><ul class="dropdown-menu"><% if (item.isTrash) { %><li><a data-action="empty-trash" href="javascript:void(0)">' + ccmi18n_sitemap.emptyTrash + '</a></li><% } else if (item.isInTrash) { %><li><a data-action="delete-forever" href="javascript:void(0)">' + ccmi18n_sitemap.deletePageForever + "</a></li><% } else if (item.cAlias == 'LINK' || item.cAlias == 'POINTER') { %><li><a href=\"<%=item.link%>\">" + ccmi18n_sitemap.visitExternalLink + '</a></li><% if (item.cAlias == \'LINK\' && item.canEditPageProperties) { %><li><a class="dialog-launch" dialog-width="350" dialog-height="260" dialog-title="' + ccmi18n_sitemap.editExternalLink + '" dialog-modal="false" dialog-append-buttons="true" href="' + CCM_DISPATCHER_FILENAME + '/ccm/system/dialogs/page/edit_external?cID=<%=item.cID%>">' + ccmi18n_sitemap.editExternalLink + '</a></li><li><a class="dialog-launch" dialog-on-close="ConcreteSitemap.exitEditMode(<%=item.cID%>)" dialog-width="90%" dialog-height="70%" dialog-modal="false" dialog-title="' + ccmi18n_sitemap.pageAttributesTitle + '" href="' + CCM_DISPATCHER_FILENAME + '/ccm/system/dialogs/page/attributes?cID=<%=item.cID%>">' + ccmi18n_sitemap.pageAttributes + '</a></li><li><a class="dialog-launch" dialog-on-close="ConcreteSitemap.exitEditMode(<%=item.cID%>)" dialog-width="500" dialog-height="630" dialog-modal="false" dialog-title="' + ccmi18n_sitemap.setPagePermissions + '" href="' + CCM_DISPATCHER_FILENAME + '/ccm/system/panels/details/page/permissions?cID=<%=item.cID%>">' + ccmi18n_sitemap.setPagePermissions + '</a></li><% } %><% if (item.canDeletePage) { %><li><a class="dialog-launch" dialog-width="360" dialog-height="150" dialog-modal="false" dialog-title="' + ccmi18n_sitemap.deleteExternalLink + '" href="' + CCM_DISPATCHER_FILENAME + '/ccm/system/dialogs/page/delete_alias?cID=<%=item.cID%>">' + ccmi18n_sitemap.deleteExternalLink + '</a></li><% } %><% } else { %><li><a href="<%=item.link%>">' + ccmi18n_sitemap.visitPage + '</a></li><% if (item.canEditPageProperties || item.canEditPageSpeedSettings || item.canEditPagePermissions || item.canEditPageDesign || item.canViewPageVersions || item.canDeletePage) { %><li class="divider"></li><% } %><% if (item.canEditPageProperties) { %><li><a class="dialog-launch" dialog-on-close="ConcreteSitemap.exitEditMode(<%=item.cID%>)" dialog-width="640" dialog-height="360" dialog-modal="false" dialog-title="' + ccmi18n_sitemap.seo + '" href="' + CCM_DISPATCHER_FILENAME + '/ccm/system/dialogs/page/seo?cID=<%=item.cID%>">' + ccmi18n_sitemap.seo + '</a></li><li><a class="dialog-launch" dialog-on-close="ConcreteSitemap.exitEditMode(<%=item.cID%>)" dialog-width="500" dialog-height="500" dialog-modal="false" dialog-title="' + ccmi18n_sitemap.pageLocationTitle + '" href="' + CCM_DISPATCHER_FILENAME + '/ccm/system/dialogs/page/location?cID=<%=item.cID%>">' + ccmi18n_sitemap.pageLocation + '</a></li><li class="divider"></li><li><a class="dialog-launch" dialog-on-close="ConcreteSitemap.exitEditMode(<%=item.cID%>)" dialog-width="90%" dialog-height="70%" dialog-modal="false" dialog-title="' + ccmi18n_sitemap.pageAttributesTitle + '" href="' + CCM_DISPATCHER_FILENAME + '/ccm/system/dialogs/page/attributes?cID=<%=item.cID%>">' + ccmi18n_sitemap.pageAttributes + '</a></li><% } %><% if (item.canEditPageSpeedSettings) { %><li><a class="dialog-launch" dialog-on-close="ConcreteSitemap.exitEditMode(<%=item.cID%>)" dialog-width="550" dialog-height="280" dialog-modal="false" dialog-title="' + ccmi18n_sitemap.speedSettingsTitle + '" href="' + CCM_DISPATCHER_FILENAME + '/ccm/system/panels/details/page/caching?cID=<%=item.cID%>">' + ccmi18n_sitemap.speedSettings + '</a></li><% } %><% if (item.canEditPagePermissions) { %><li><a class="dialog-launch" dialog-on-close="ConcreteSitemap.exitEditMode(<%=item.cID%>)" dialog-width="500" dialog-height="630" dialog-modal="false" dialog-title="' + ccmi18n_sitemap.setPagePermissions + '" href="' + CCM_DISPATCHER_FILENAME + '/ccm/system/panels/details/page/permissions?cID=<%=item.cID%>">' + ccmi18n_sitemap.setPagePermissions + '</a></li><% } %><% if (item.canEditPageDesign || item.canEditPageType) { %><li><a class="dialog-launch" dialog-on-close="ConcreteSitemap.exitEditMode(<%=item.cID%>)" dialog-width="350" dialog-height="500" dialog-modal="false" dialog-title="' + ccmi18n_sitemap.pageDesign + '" href="' + CCM_DISPATCHER_FILENAME + '/ccm/system/dialogs/page/design?cID=<%=item.cID%>">' + ccmi18n_sitemap.pageDesign + '</a></li><% } %><% if (item.canViewPageVersions) { %><li><a class="dialog-launch" dialog-on-close="ConcreteSitemap.exitEditMode(<%=item.cID%>)" dialog-width="640" dialog-height="340" dialog-modal="false" dialog-title="' + ccmi18n_sitemap.pageVersions + '" href="' + CCM_DISPATCHER_FILENAME + '/ccm/system/panels/page/versions?cID=<%=item.cID%>">' + ccmi18n_sitemap.pageVersions + '</a></li><% } %><% if (item.canDeletePage) { %><li><a class="dialog-launch" dialog-on-close="ConcreteSitemap.exitEditMode(<%=item.cID%>)" dialog-width="360" dialog-height="250" dialog-modal="false" dialog-title="' + ccmi18n_sitemap.deletePage + '" href="' + CCM_DISPATCHER_FILENAME + '/ccm/system/dialogs/page/delete_from_sitemap?cID=<%=item.cID%>">' + ccmi18n_sitemap.deletePage + '</a></li><% } %><li class="divider" data-sitemap-mode="explore"></li><li data-sitemap-mode="explore"><a class="dialog-launch" dialog-width="90%" dialog-height="70%" dialog-modal="false" dialog-title="' + ccmi18n_sitemap.moveCopyPage + '" href="' + CCM_TOOLS_PATH + '/sitemap_search_selector?sitemap_select_mode=move_copy_delete&cID=<%=item.cID%>">' + ccmi18n_sitemap.moveCopyPage + '</a></li><li data-sitemap-mode="explore"><a href="' + CCM_DISPATCHER_FILENAME + '/dashboard/sitemap/explore?cNodeID=<%=item.cID%>&task=send_to_top">' + ccmi18n_sitemap.sendToTop + '</a></li><li data-sitemap-mode="explore"><a href="' + CCM_DISPATCHER_FILENAME + '/dashboard/sitemap/explore?cNodeID=<%=item.cID%>&task=send_to_bottom">' + ccmi18n_sitemap.sendToBottom + '</a></li><% if (item.numSubpages > 0) { %><li class="divider"></li><li><a href="' + CCM_DISPATCHER_FILENAME + '/dashboard/sitemap/search/?submitSearch=1&field[]=parent&cParentAll=1&cParentIDSearchField=<%=item.cID%>">' + ccmi18n_sitemap.searchPages + '</a></li><li><a href="' + CCM_DISPATCHER_FILENAME + '/dashboard/sitemap/explore/-/<%=item.cID%>">' + ccmi18n_sitemap.explorePages + '</a></li><% } %><% if (item.canAddExternalLinks || item.canAddSubpages) { %><li class="divider"></li><% if (item.canAddSubpages > 0) { %><li><a class="dialog-launch" dialog-width="350" dialog-modal="false" dialog-height="350" dialog-title="' + ccmi18n_sitemap.addPage + '" dialog-modal="false" href="' + CCM_DISPATCHER_FILENAME + '/ccm/system/dialogs/page/add?cID=<%=item.cID%>">' + ccmi18n_sitemap.addPage + '</a></li><% } %><% if (item.canAddExternalLinks > 0) { %><li><a class="dialog-launch" dialog-width="350" dialog-modal="false" dialog-height="400" dialog-title="' + ccmi18n_sitemap.addExternalLink + '" dialog-modal="false" href="' + CCM_DISPATCHER_FILENAME + '/ccm/system/dialogs/page/add_external?cID=<%=item.cID%>">' + ccmi18n_sitemap.addExternalLink + "</a></li><% } %><% } %><% } %></ul></div></div>"
        }
    };
    b.fn.concretePageAjaxSearch = function(a) {
        return b.each(b(this), function(d, e) {
            new c(b(this), a)
        })
    }, a.ConcretePageAjaxSearch = c, a.ConcretePageAjaxSearchMenu = d
}(this, $), ! function(a, b) {
    "use strict";

    function c(a, c) {
        var d = this,
            c = b.extend({
                chooseText: ccmi18n_sitemap.choosePage,
                loadingText: ccmi18n_sitemap.loadingText,
                inputName: "cID",
                cID: 0
            }, c);
        d.$element = a, d.options = c, d._chooseTemplate = _.template(d.chooseTemplate, {
            options: d.options
        }), d._loadingTemplate = _.template(d.loadingTemplate), d._pageLoadedTemplate = _.template(d.pageLoadedTemplate), d._pageMenuTemplate = _.template(ConcretePageAjaxSearchMenu.get()), d.$element.append(d._chooseTemplate), d.$element.on("click", "a[data-page-selector-link=choose]", function(a) {
            a.preventDefault(), ConcretePageAjaxSearch.launchDialog(function(a) {
                d.loadPage(a.cID)
            })
        }), d.options.cID && d.loadPage(d.options.cID)
    }
    c.prototype = {
        chooseTemplate: '<div class="ccm-item-selector"><input type="hidden" name="<%=options.inputName%>" value="0" /><a href="#" data-page-selector-link="choose"><%=options.chooseText%></a></div>',
        loadingTemplate: '<div class="ccm-item-selector"><div class="ccm-item-selector-choose"><input type="hidden" name="<%=options.inputName%>" value="<%=cID%>"><i class="fa fa-spin fa-spinner"></i> <%=options.loadingText%></div></div>',
        pageLoadedTemplate: '<div class="ccm-item-selector"><div class="ccm-item-selector-item-selected"><input type="hidden" name="<%=inputName%>" value="<%=page.cID%>" /><a data-page-selector-action="clear" href="#" class="ccm-item-selector-clear"><i class="fa fa-close"></i></a><div class="ccm-item-selector-item-selected-title"><%=page.name%></div></div></div>',
        loadPage: function(a) {
            var b = this;
            b.$element.html(b._loadingTemplate({
                options: b.options,
                cID: a
            })), ConcretePageAjaxSearch.getPageDetails(a, function(a) {
                var c = a.pages[0];
                b.$element.html(b._pageLoadedTemplate({
                    inputName: b.options.inputName,
                    page: c
                })), b.$element.on("click", "a[data-page-selector-action=clear]", function(a) {
                    a.preventDefault(), b.$element.html(b._chooseTemplate)
                })
            })
        }
    }, b.fn.concretePageSelector = function(a) {
        return b.each(b(this), function(d, e) {
            new c(b(this), a)
        })
    }, a.ConcretePageSelector = c
}(this, $), ! function(a, b) {
    "use strict";

    function c(a, c) {
        var d = this,
            c = b.extend({
                mode: "single",
                inputName: "cID",
                selected: 0,
                startingPoint: 1,
                token: "",
                filters: {}
            }, c);
        d.$element = b("<div />", {
            class: "ccm-page-sitemap-selector-inner"
        }), d.$element.appendTo(a), d.options = c, d.$element.concreteSitemap({
            selectMode: d.options.mode,
            minExpandLevel: 0,
            dataSource: CCM_DISPATCHER_FILENAME + "/ccm/system/page/select_sitemap",
            ajaxData: {
                startingPoint: d.options.startingPoint,
                ccm_token: d.options.token,
                selected: d.options.selected,
                filters: d.options.filters
            },
            init: function() {
                if (c.selected)
                    if ("multiple" == c.mode) b.each(c.selected, function(a, b) {
                        var c = d.$element.find(".ccm-sitemap-tree").fancytree("getTree").getNodeByKey(String(b));
                        c && c.setSelected(!0)
                    });
                    else {
                        var a = d.$element.find(".ccm-sitemap-tree").fancytree("getTree"),
                            e = a.getNodeByKey(String(c.selected));
                        e && e.setSelected(!0)
                    }
            },
            onSelectNode: function(a, b) {
                return !a.data.hideCheckbox && void(b ? ("single" == d.options.mode && d.deselectAll(), d.select(a)) : d.deselect(a))
            }
        })
    }
    c.prototype = {
        deselectAll: function() {
            var a = this,
                b = a.$element.find("input[data-sitemap-selector-page-id]");
            b.remove()
        },
        deselect: function(a) {
            var b = this,
                c = b.$element.find("input[data-sitemap-selector-page-id=" + a.data.cID + "]");
            c.remove()
        },
        select: function(a) {
            var c = this,
                d = c.options.inputName;
            "multiple" == c.options.mode && (d += "[]");
            var e = b("<input />", {
                "data-sitemap-selector-page-id": a.data.cID,
                type: "hidden",
                name: d
            });
            e.val(a.data.cID), e.appendTo(c.$element)
        }
    }, b.fn.concretePageSitemapSelector = function(a) {
        return b.each(b(this), function(d, e) {
            new c(b(this), a)
        })
    }, a.ConcretePageSitemapSelector = c
}(this, $);