# LightningTP Plugin

**LightningTP** is a Minecraft plugin for PocketMine-MP that triggers a lightning bolt when a player teleports. It provides a unique visual and sound effect to enhance the teleportation experience.

## Features

- **Lightning Effect**: Sends a lightning bolt to the location of the player who teleports.
- **Sound Effect**: Plays a thunder sound effect upon teleportation.
- **Particle Effect**: Adds a block break particle at the player's location after teleportation.

## Installation

1. **Download the Plugin**:
   - Download the `LightningTP.phar` file from the [releases page](https://poggit.pmmp.io/ci/pixelwhiz/LightningTP/LightningTP).

2. **Install the Plugin**:
   - Place the `LightningTP.phar` file in the `plugins` directory of your PocketMine-MP server.

3. **Configure the Plugin**:
   - The plugin does not require additional configuration. It uses default settings.

## Configuration

No configuration is required for this plugin. It works out of the box with the default settings.

## Permissions

The plugin uses the following permission node:

- `lightningtp.tp`: Allows players to trigger the lightning effect on teleportation. Default is `op`.

## Usage

- **Teleportation Lightning**: When a player with the `lightningtp.tp` permission teleports, a lightning bolt will strike their location, and a thunder sound effect will play. A block break particle effect will also be displayed at the location.

## Commands

This plugin does not add any commands.

## Dependencies

- No additional dependencies required.

## Contributing

Feel free to contribute to the development of LightningTP by submitting pull requests or reporting issues.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
