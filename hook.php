<?php
/**
 * -------------------------------------------------------------------------
 * PatchPanel plugin for GLPI
 * Copyright (C) 2019 by the PatchPanel Development Team.
 *
 * https://github.com/pluginsGLPI/patchpanel
 * -------------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of PatchPanel.
 *
 * PatchPanel is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * PatchPanel is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with PatchPanel. If not, see <http://www.gnu.org/licenses/>.
 * --------------------------------------------------------------------------
 */

/**
 * Plugin install process
 *
 * @return boolean
 */
function plugin_patchpanel_install() {
   $migration = new Migration(100);
   $migration->executeMigration();
   return true;
}

/**
 * Plugin uninstall process
 *
 * @return boolean
 */
function plugin_patchpanel_uninstall() {
   // No direct DB calls allowed in uninstall logic for GLPI 11+.
   return true;
}

function plugin_patchpanel_getDatabaseRelations() {
   return [
      "glpi_plugin_patchpanel_patchpaneltypes" => ["glpi_plugin_patchpanel" => "pluginpatchpanelpatchpaneltypes_id"],
      "glpi_plugin_patchpanel_patchpanelmodels" => ["glpi_plugin_patchpanel" => "pluginpatchpanelpatchpanelmodels_id"],
      "glpi_plugin_patchpanel_patchpanel" => ["glpi_plugin_patchpanel" => "pluginpatchpanelpatchpanel_id"],
   ];
}

function plugin_patchpanel_getDropdown() {
   return [
      'PluginPatchpanelPatchpanelModel' => PluginPatchpanelPatchpanelModel::getTypeName(2),
      'PluginPatchpanelPatchpanelType' => PluginPatchpanelPatchpanelType::getTypeName(2),
   ];
}