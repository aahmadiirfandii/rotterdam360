<script type="text/javascript" src="<?= assets() ?>pannellum/pannellum.js"></script>
<script>
    $(document).ready(function() {

        const siteURL = "<?= site_url('virtual-tour') ?>";

        var viewer = pannellum.viewer('panorama', {
            "default": {
                "firstScene": "<?= $scene_id ?>",
                // "author": "<?= $setting->author ?>",
                "autoLoad": <?= ($setting->autoload == 1) ? "true" : "false" ?>,
                "sceneFadeDuration": <?= $setting->scene_fade_duration ?>
            },
            "scenes": {
                <?php foreach ($scenes as $scene) { ?> "<?= $scene->scene_id ?>": {
                        // "mouseZoom": false,
                        "type": "<?= $scene->type ?>",
                        "autoRotate": -4,
                        "panorama": "<?= images() . $scene->panorama ?>",
                        "title": "<?= $scene->title ?>",
                        "hfov": <?= $scene->hfov ?>,
                        "pitch": <?= $scene->pitch ?>,
                        "yaw": <?= $scene->yaw ?>,
                        "hotSpots": [
                            <?php
                            $hotspots = $this->db->where('main_scene', $scene->scene_id)->get('hotspots')->result();
                            foreach ($hotspots as $hotspot) {
                            ?> {
                                    "pitch": <?= $hotspot->pitch ?>,
                                    "yaw": <?= $hotspot->yaw ?>,
                                    "type": "<?= $hotspot->type ?>",
                                    "text": "<?= $hotspot->text ?>",
                                    "sceneId": "<?= $hotspot->scene_id ?>",
                                    "clickHandlerArgs": "<?= $hotspot->scene_id ?>",
                                    "clickHandlerFunc": function(clickEvent, id) {
                                        window.history.pushState('scene', '<?= $title ?>', siteURL + '?scene=' + id);
                                        detailBox("moveScene");
                                    },
                                },
                            <?php } ?>
                        ]
                    },
                <?php } ?> "": {}
            }
        });

        // viewer.on('mousedown', function(event) {
        //     // For pitch and yaw of center of viewer
        //     console.log(viewer.getPitch(), viewer.getYaw());
        //     // For pitch and yaw of mouse location
        //     console.log(viewer.mouseEventToCoords(event));
        // });

        $(document).on('click', '#btnInformasi', function() {
            detailBox("toggle");

            let urlParams = new URLSearchParams(window.location.search);
            let scene = urlParams.get('scene');
            // console.log(scene);
            $.get('<?= site_url('virtual-tour/get-scene-detail') ?>', {
                    id: scene
                })
                .done(function(response) {
                    if (response.success) {
                        $('#namaTempat').html(response.data.title);
                        $('#deskripsi').html(response.data.description);
                        $("#detailButton").attr("href", "<?= site_url('buildings/detail/') ?>" +
                            response.data.id);
                        if (response.data.status == 'gedung') {
                            $('#detail-btn-container').css('display', 'block');
                        } else {
                            $('#detail-btn-container').css('display', 'none');
                        }
                    } else {
                        // alert(response.message);
                        setTimeout(function() {
                            location.reload();
                        }, 500)
                    }
                })
                .fail(function() {
                    alert("Failed to retrieved data!");
                });
        });

        function detailBox(param) {
            var x = document.getElementById("infoBox");
            // console.log(param);
            if (param == 'moveScene') {
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "none";
                }
            } else {
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        }
    });
</script>
